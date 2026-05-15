<?php
    include_once("modelos/DescripcionValor.php");
    include_once("modelos/Valor.php");

    class ControladorValor{

        public function inicio(){
            // print_r(Valor::mostrarValores());
            $registrosDeValores = Valor::mostrarValores();
            include_once("vistas/descripcion-valor/valores/inicio.php");
        }

        public function crear(){
            if ($_POST) {
                // *Recibiendo los valores enviados desde el formulario
                // print_r($_POST);
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $descripcionValorId = $_POST['descripcion_valor_id'];

                $valor = new Valor();
                $valor->setTitulo($titulo);
                $valor->setDescripcion($descripcion);
                $valor->setDescripcionValorId($descripcionValorId);

                if (!$valor->validar()) {
                    $errores = $valor->getErrores();
                    $registroDescripcionValor = DescripcionValor::mostrarRegistroDescripcionValor();
                    // print_r($registroDescripcionValor);
                    include_once("vistas/descripcion-valor/valores/crear.php");
                    return;
                } else {
                    // *Accedemos al método del modelo para registrar valor
                    Valor::registrarValor($titulo,$descripcion,$descripcionValorId);
                    $_SESSION['mensaje'] = "Valor registrado satisfactoriamente";
                    // *Redireccionando a la vista inicio, una vez guarde el registro en la base de Datos
                    header("Location: ./?controlador=valor&accion=inicio");
                    exit;
                }
            }

            $registroDescripcionValor = DescripcionValor::mostrarRegistroDescripcionValor();
            // print_r($registroDescripcionValor);
            include_once("vistas/descripcion-valor/valores/crear.php");
        }

        public function editar(){
            // print_r($_GET['id']);
            if ($_POST) {
                // print_r($_POST);
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $id = $_POST['id'];
                $valor = new Valor();
                $valor->setTitulo($titulo);
                $valor->setDescripcion($descripcion);
                Valor::actualizarValor($titulo,$descripcion,$id);
                $_SESSION['mensaje'] = "Valor actualizado satisfactoriamente";
                header("Location: ./?controlador=valor&accion=inicio");        
            }

            $id = $_GET['id'];
            $registroValor = Valor::buscarValor($id);
            include_once("vistas/descripcion-valor/valores/editar.php");
        }

        
        public function eliminar(){
            // print_r($_GET['id']);
            $id = $_GET['id'];
            Valor::eliminarValor($id);
            header("Location: ./?controlador=valor&accion=inicio");
        }
    }