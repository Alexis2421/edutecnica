<?php

include_once("modelos/Configuracion.php");

class ControladorConfiguracion
{
    // *Función para editar el primer registro de configuración
    public function editar()
    {
        if (isset($_POST['formulario_general'])) {
            $id = $_POST['id'];
            $nombreInstitucion = $_POST['nombre_institucion'];
            $colorEncabezado = $_POST['color_encabezado'];
            $facebook = $_POST['facebook'];
            $instagram = $_POST['instagram'];
            $tiktok = $_POST['tiktok'];
            $logo = $_FILES['logo'];

            $rutaAGuardarBD = null;
            $registroLogo = Configuracion::mostrarPrimerRegistroConfiguracion();
            $rutaAGuardarBD = $registroLogo->getLogo();

            $configuracionGeneral = new Configuracion();
            $configuracionGeneral->setNombreInstitucion($nombreInstitucion);
            $configuracionGeneral->setColorEncabezado($colorEncabezado);
            $configuracionGeneral->setFacebook($facebook);
            $configuracionGeneral->setInstagram($instagram);
            $configuracionGeneral->setTiktok($tiktok);

            if (!$configuracionGeneral->validarConfiguracionGeneral($_FILES)) {
                $errores = $configuracionGeneral->getErrores();
                $datosConfiguracion = Configuracion::mostrarPrimerRegistroConfiguracion();
                include_once("vistas/configuracion/editar.php");
                return;
            } else {
                // *Verificación al cargar la imagen por parte del usuario
                if (isset($_FILES['logo']['name']) && $_FILES['logo']['error'] == 0) {
                    // print_r("se ha cargado una imagen");

                    // *Si existe una imagen guardada, entonces la elimino
                    $rutaLogo = $registroLogo->getLogo();

                    // *Verifico la existencia de la imagen a tráves de la variable
                    if (!empty($rutaLogo)) {
                        // *elimino la imagen
                        unlink($rutaLogo);
                    }
                    // *Definición de la ruta donde se va a guardar la imagen
                    $rutaAGuardarLogo = "public/almacenamiento/institucion/";

                    // *Se verifica la ruta, y en caso de que no exista, se crea
                    if (!is_dir($rutaAGuardarLogo)) {
                        mkdir($rutaAGuardarLogo, 0755, true);
                    }

                    // *Se define un nombre único para la imagen
                    $nombreUnico = uniqid() . "_" . $_FILES['logo']['name'];

                    // *Se define la ruta completa con el nombre único de la imagen
                    $rutaCompleta = $rutaAGuardarLogo . $nombreUnico;

                    // *Movemos la imagen de la carpeta temporal de PHP, a la ruta completa que hemos creado
                    move_uploaded_file($_FILES['logo']['tmp_name'], $rutaCompleta);

                    // *Definimos la ruta a guardar en la base de datos
                    $rutaAGuardarBD = $rutaCompleta;
                }

                Configuracion::actualizarConfiguracionGeneral($nombreInstitucion, $colorEncabezado, $facebook, $instagram, $tiktok, $rutaAGuardarBD, $id);
                $_SESSION['mensaje'] = "Configuración general actualizada correctamente";
                // *Redireccionando al formulario de editar
                header("Location: ./?controlador=configuracion&accion=editar");
                exit;
            }
        }

        if (isset($_POST['formulario_contacto'])) {
            $id = $_POST['id'];
            $nombreContacto = $_POST['nombre_contacto'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];

            $configuracionContacto = new Configuracion();
            $configuracionContacto->setNombreContacto($nombreContacto);
            $configuracionContacto->setDireccion($direccion);
            $configuracionContacto->setCorreo($correo);
            $configuracionContacto->setTelefono($telefono);

            if (!$configuracionContacto->validarConfiguracionContacto()) {
                $errores = $configuracionContacto->getErrores();
                $datosConfiguracion = Configuracion::mostrarPrimerRegistroConfiguracion();
                include_once("vistas/configuracion/editar.php");
                return;
            }else{
                Configuracion::actualizarConfiguracionContacto($nombreContacto, $direccion, $correo, $telefono, $id);
                $_SESSION['mensaje'] = "Configuración de contacto actualizada correctamente";
                // *Redireccionando al formulario de editar
                header("Location: ./?controlador=configuracion&accion=editar");
                exit;
            }

          
        }


        $datosConfiguracion = Configuracion::mostrarPrimerRegistroConfiguracion();
        // print_r($datosConfiguracion->getLogo());
        include_once("vistas/configuracion/editar.php");
    }
}
