<?php 
    include_once("modelos/DescripcionGaleria.php");
    
    class ControladorDescripcionGaleria {

        // *Método para mostrar el formulario de editar
        public function editar(){
            if ($_POST) {
                // print_r($_POST);
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $id = $_POST['id'];

                $descripcionGaleria = new DescripcionGaleria();
                $descripcionGaleria->setTitulo($titulo);
                $descripcionGaleria->setDescripcion($descripcion);

                if (!$descripcionGaleria->validar()) {
                    $errores = $descripcionGaleria->getErrores();
                    $registroDescripcionGaleria = DescripcionGaleria::mostrarPrimerRegistro();
                    include_once("vistas/descripcion-galeria/editar.php");
                    return;
                }else{
                    DescripcionGaleria::actualizarDescripcionGaleria($titulo,$descripcion,$id);
                    $_SESSION['mensaje'] = "Registro de descripcion galeria Actualizado Satisfactoriamente";
                    header("Location: ./?controlador=descripciongaleria&accion=editar");
                    exit;
                }

               

            }
            $registroDescripcionGaleria = DescripcionGaleria::mostrarPrimerRegistro();
            include_once("vistas/descripcion-galeria/editar.php");
        }
    }