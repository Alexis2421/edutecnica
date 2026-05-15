<?php
    include_once("config/conexion.php");
    include_once("modelos/Contenido.php");

    class DescripcionPrograma extends Contenido{


        public function __construct($id=null, $titulo='', $descripcion='')
        {
            return parent::__construct($id, $titulo, $descripcion);
        }

        // *Consulta para mostrar el primer registro
        public static function mostrarPrimerRegistro(){
            $conexion = conexion::conexionBD();
            $registroAMostrar = $conexion->prepare("SELECT * from descripcion_programa order by id asc limit 1");
            $registroAMostrar->execute();
            $registroEncontrado = $registroAMostrar->fetch();
            return new DescripcionPrograma($registroEncontrado['id'], $registroEncontrado['titulo'], $registroEncontrado['descripcion']);
        }

        // *Consulta para actualizar el registro de descripción programa
        public static function actualizarDescripcionPrograma($titulo,$descripcion,$id){
            $conexion = conexion::conexionBD();
            $registroAActualizar = $conexion->prepare("UPDATE descripcion_programa set titulo=?, descripcion=? where id=?");
            $registroAActualizar->execute(array($titulo,$descripcion,$id));
        }


    }