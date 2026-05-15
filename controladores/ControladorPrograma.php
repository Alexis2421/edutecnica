<?php

include_once("modelos/DescripcionPrograma.php");
include_once("modelos/Programa.php");


class ControladorPrograma
{

    public function inicio()
    {
        $registrosDeProgramas =  Programa::mostrarProgramas();
        // print_r($registrosDeProgramas);
        include_once("vistas/descripcion-programa/programas/inicio.php");
    }

    public function crear()
    {
        if ($_POST) {
            // print_r($_POST);
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            // *Llave foránea
            $descripcionProgramaId = $_POST['descripcion_programa_id'];
            $rutaAGuardaBd = null;


            $programa = new Programa();
            $programa->setTitulo($titulo);
            $programa->setDescripcion($descripcion);
            $programa->setDescripcionProgramaId($descripcionProgramaId);

            if (!$programa->validar($_FILES)) {
                $errores = $programa->getErrores();
                $registroDescripcionPrograma = DescripcionPrograma::mostrarPrimerRegistro();
                include_once("vistas/descripcion-programa/programas/crear.php");
                return;
            } else {
                // *Verificación del recibido de la imagen
                if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['error'] == 0) {
                    // *Creamos la ruta a guardar la imagen
                    $rutaAGuardar = "public/almacenamiento/programas/";

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

                Programa::registrarPrograma($titulo, $descripcion, $rutaAGuardaBd, $descripcionProgramaId,);
                $_SESSION['mensaje'] = "Programa registrado satisfactoriamente";
                header("Location: ./?controlador=programa&accion=inicio");
                exit;
            }
        }

        $registroDescripcionPrograma = DescripcionPrograma::mostrarPrimerRegistro();
        include_once("vistas/descripcion-programa/programas/crear.php");
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

             // *Llave foránea
            $descripcionProgramaId = $_POST['descripcion_programa_id'];

            $rutaAGuardarBD = null;
            $registroImagen = Programa::mostrarRegistroPrograma($id);
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
                $rutaAGuardarImagen = "public/almacenamiento/programas/";

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

                // print_r("Se ha recibido la imagen correctamente");
            }

            Programa::actualizarPrograma($titulo, $descripcion, $rutaAGuardarBD, $id);
            $_SESSION['mensaje'] = "Programa actualizado satisfactoriamente";
            // *Redireccionando al formulario de editar
            header("Location: ./?controlador=programa&accion=inicio");
        }

        $id = $_GET['id'];
        // *Mostrando los datos del primer registro a través del modelo programa
        $registroPrograma = Programa::mostrarRegistroPrograma($id);
        // print_r($registroInicio);
        include_once("vistas/descripcion-programa/programas/editar.php");
    }

    public function eliminar()
    {
        // print_r($_GET['id']);
        $id = $_GET['id'];
        $registroImagen = Programa::mostrarRegistroPrograma($id);
        $rutaImagen = $registroImagen['imagen'];
        // *Verifico la existencia de la imagen a tráves de la variable
        if (!empty($rutaImagen)) {
            // *elimino la imagen
            unlink($rutaImagen);
        }

        Programa::eliminarPrograma($id);
        header("Location: ./?controlador=programa&accion=inicio");
    }
}
