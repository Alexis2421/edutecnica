<?php 
    include_once("modelos/DescripcionPrograma.php");
    
    class ControladorDescripcionPrograma {

        // *Método para mostrar el formulario de editar
        public function editar(){
            if ($_POST) {
                // print_r($_POST);
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $id = $_POST['id'];

                $descripcionPrograma = new DescripcionPrograma();
                $descripcionPrograma->setTitulo($titulo);
                $descripcionPrograma->setDescripcion($descripcion);

                if (!$descripcionPrograma->validar()) {
                    $errores = $descripcionPrograma->getErrores();
                    // *Mostrando los datos del primer registro a través del modelo Descripcion Programa
                    $registroDescripcionPrograma = DescripcionPrograma::mostrarPrimerRegistro();
                    // print_r($registroPrograma);
                    include_once("vistas/descripcion-programa/editar.php");
                    return;
                }else{
                    DescripcionPrograma::actualizarDescripcionPrograma($titulo,$descripcion,$id);
                    $_SESSION['mensaje'] = "Registro de descripcion programa Actualizado Satisfactoriamente";
                    header("Location: ./?controlador=descripcionprograma&accion=editar");
                    exit;
                }
            }
            $registroDescripcionPrograma = DescripcionPrograma::mostrarPrimerRegistro();
            include_once("vistas/descripcion-programa/editar.php");
        }
    }