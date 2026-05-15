<?php
include_once("modelos/DescripcionValor.php");


class ControladorDescripcionValor
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
            print_r($id);

            $descripcionValor = new DescripcionValor();
            $descripcionValor->setTitulo($titulo);
            $descripcionValor->setDescripcion($descripcion);

            if (!$descripcionValor->validar()) {
               $errores = $descripcionValor->getErrores();
                // *Mostrando los datos del primer registro a través del modelo Descripcion Valor
                $registroDescripcionValor = DescripcionValor::mostrarRegistroDescripcionValor();
                // print_r($registroInicio);
                include_once("vistas/descripcion-valor/editar.php");
                return;
            } else {

                DescripcionValor::actualizarDescripcionValor($titulo, $descripcion, $id);
                $_SESSION['mensaje'] = "Registro de descripcion valor Actualizado satisfactoriamente";
                // *Redireccionando al formulario de editar
                header("Location: ./?controlador=descripcionvalor&accion=editar");
                exit;
            }
        }
        // *Mostrando los datos del primer registro a través del modelo Descripcion Valor
        $registroDescripcionValor = DescripcionValor::mostrarRegistroDescripcionValor();
        // print_r($registroInicio);
        include_once("vistas/descripcion-valor/editar.php");
    }
}
