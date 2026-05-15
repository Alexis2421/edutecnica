<?php
include_once("modelos/Inicio.php");


class ControladorInicio
{

    // *Función para editar el registro de inicio
    public function editar()
    {
        // *Recibiendo los datos enviados desde el formulario
        // print_r($_POST);
        if ($_POST) {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $id = $_POST['id'];
            // print_r($id);
            $inicio = new Inicio();
            $inicio->setTitulo($titulo);
            $inicio->setDescripcion($descripcion);

            $rutaAGuardarBD = null;
            $registroImagen = Inicio::mostrarPrimerRegistroInicio();
            $rutaAGuardarBD = $registroImagen->getImagen();

            // *Validación y mensajes de confirmación
            if (!$inicio->validar($_FILES, $rutaAGuardarBD)) {
                $errores = $inicio->getErrores();
                $registroInicio = Inicio::mostrarPrimerRegistroInicio();
                include_once("vistas/inicio/editar.php");
                return;
            } else {
                // *Se verifica si el usuario ha cargado una imagen
                if (isset($_FILES['imagen_inicio']['name']) && $_FILES['imagen_inicio']['error'] == 0) {

                    // *Si existe una imagen guardada, entonces la elimino
                    $rutaImagen = $registroImagen->getImagen();

                    // *Verifico la existencia de la imagen a tráves de la variable
                    if (!empty($rutaImagen)) {
                        // *elimino la imagen
                        unlink($rutaImagen);
                    }
                    // *Definición de la ruta donde se va a guardar la imagen
                    $rutaAGuardarImagen = "public/almacenamiento/inicio/";

                    // *Se verifica la ruta, y en caso de que no exista, se crea
                    if (!is_dir($rutaAGuardarImagen)) {
                        mkdir($rutaAGuardarImagen, 0755, true);
                    }

                    // *Se define un nombre único para la imagen
                    $nombreUnico = uniqid() . "_" . $_FILES['imagen_inicio']['name'];

                    // *Se define la ruta completa con el nombre único de la imagen
                    $rutaCompleta = $rutaAGuardarImagen . $nombreUnico;

                    // *Movemos la imagen de la carpeta temporal de PHP, a la ruta completa que hemos creado
                    move_uploaded_file($_FILES['imagen_inicio']['tmp_name'], $rutaCompleta);

                    // *Definimos la ruta a guardar en la base de datos
                    $rutaAGuardarBD = $rutaCompleta;

                    
                }

                Inicio::actualizarInicio($titulo, $descripcion, $rutaAGuardarBD, $id);

                // *Mensaje de Confirmación
                $_SESSION['mensaje'] = "Registro de inicio Actualizado Satisfactoriamente";

                // *Redireccionando al formulario de editar
                header("Location: index.php?controlador=inicio&accion=editar");
                exit;
            }
        }
        // *Mostrando los datos del primer registro a través del modelo inicio
        $registroInicio = Inicio::mostrarPrimerRegistroInicio();
        // print_r($registroInicio);
        include_once("vistas/inicio/editar.php");
    }
}
