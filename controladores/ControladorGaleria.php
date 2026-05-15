<?php

include_once("modelos/DescripcionGaleria.php");
include_once("modelos/Galeria.php");


class ControladorGaleria
{

    public function inicio()
    {
        $registrosDeGaleria =  Galeria::mostrarGaleria();
        // print_r($registrosDeGaleria);
        include_once("vistas/descripcion-galeria/galeria/inicio.php");
    }

    public function crear()
    {
        if ($_POST) {
            // print_r($_POST);
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            // *Llave foránea
            $descripcionGaleriaId = $_POST['descripcion_galeria_id'];

            $rutaAGuardaBd = null;


            $galeria = new Galeria();
            $galeria->setTitulo($titulo);
            $galeria->setDescripcion($descripcion);
            $galeria->setDescripcionGaleriaId($descripcionGaleriaId);

            if (!$galeria->validar($_FILES)) {
                $errores = $galeria->getErrores();
                $registroDescripcionGaleria = DescripcionGaleria::mostrarPrimerRegistro();
                include_once("vistas/descripcion-galeria/galeria/crear.php");
                return;
            } else {
                // *Verificación del recibido de la imagen
                if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['error'] == 0) {
                    // *Creamos la ruta a guardar la imagen
                    $rutaAGuardar = "public/almacenamiento/galeria/";

                    // *Creamos la carpeta en caso de no estar creada
                    if (!is_dir($rutaAGuardar)) {
                        mkdir($rutaAGuardar, 0755, true);
                    }

                    // *Definimos un nombre único a la imagen
                    $nombreUnico = uniqid() . "_" . $_FILES['imagen']['name'];

                    // *Se define la ruta completa
                    $rutaCompleta = $rutaAGuardar . $nombreUnico;
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta);

                    $rutaAGuardaBd = $rutaCompleta;
                }


                Galeria::registrarGaleria($titulo, $descripcion, $rutaAGuardaBd, $descripcionGaleriaId);
                $_SESSION['mensaje'] = "Imagen de galeria registrada satisfactoriamente";
                // *Redireccionando a la vista inicio, una vez guarde el registro en la base de Datos
                header("Location: ./?controlador=galeria&accion=inicio");
            }
        }

        $registroDescripcionGaleria = DescripcionGaleria::mostrarPrimerRegistro();
        include_once("vistas/descripcion-galeria/galeria/crear.php");
    }

    public function editar()
    {
        // print_r($_GET['id']);
        // *Recibiendo los datos enviados desde el formulario
        // print_r($_POST);
        if ($_POST) {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $id = $_POST['id'];
            print_r($id);

            $rutaAGuardarBD = null;
            $registroImagen = Galeria::mostrarRegistroGaleria($id);
            $rutaAGuardarBD = $registroImagen['imagen'];

            // *Se verifica si el usuario ha cargado una imagen
            if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['error'] == 0) {

                // *Si existe una imagen guardada, entonces la elimino
                $rutaImagen = $registroImagen['imagen'];
                // print_r($rutaImagen);
                // die("Hasta acá");

                // *Verifico la existencia de la imagen a tráves de la variable
                if (!empty($rutaImagen)) {
                    // *elimino la imagen
                    unlink($rutaImagen);
                }
                // *Definición de la ruta donde se va a guardar la imagen
                $rutaAGuardarImagen = "public/almacenamiento/galeria/";

                // *Se verifica la ruta, y en caso de que no exista, se crea
                if (!is_dir($rutaAGuardarImagen)) {
                    mkdir($rutaAGuardarImagen, 0755, true);
                }

                // *Se define un nombre único para la imagen
                $nombreUnico = uniqid() . "_" . $_FILES['imagen']['name'];

                // *Se define la ruta completa con el nombre único de la imagen
                $rutaCompleta = $rutaAGuardarImagen . $nombreUnico;

                // *Movemos la imagen de la carpeta temporal de PHP, a la ruta completa que hemos creado
                move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta);

                // *Definimos la ruta a guardar en la base de datos
                $rutaAGuardarBD = $rutaCompleta;

                print_r("Se ha recibido la imagen correctamente");
            }

            Galeria::actualizarGaleria($titulo, $descripcion, $rutaAGuardarBD, $id);
            $_SESSION['mensaje'] = "Registro de galeria Actualizado satisfactoriamente";
            // *Redireccionando al formulario de editar
            header("Location: ./?controlador=galeria&accion=inicio");
        }

        $id = $_GET['id'];
        // *Mostrando los datos del primer registro a través del modelo programa
        $registroGaleria = Galeria::mostrarRegistroGaleria($id);
        // print_r($registroInicio);
        include_once("vistas/descripcion-galeria/galeria/editar.php");
    }

    public function eliminar()
    {
        // print_r($_GET['id']);
        $id = $_GET['id'];
        $registroImagen = Galeria::mostrarRegistroGaleria($id);
        $rutaImagen = $registroImagen['imagen'];
        // *Verifico la existencia de la imagen a tráves de la variable
        if (!empty($rutaImagen)) {
            // *elimino la imagen
            unlink($rutaImagen);
        }

        Galeria::eliminarGaleria($id);
        header("Location: ./?controlador=galeria&accion=inicio");
    }
}
