<?php
    include_once("config/conexion.php");
    include_once("modelos/Contenido.php");

    class DescripcionValor extends Contenido{
       
        public function __construct($id=null,$titulo="",$descripcion="")
        {
           parent::__construct($id,$titulo,$descripcion);
        }


        // *Método para retornar el primer registro de la tabla Descripcion Valor
        public static function mostrarRegistroDescripcionValor(){
            $conexion = conexion::conexionBD();
            $registroAMostrar = $conexion->prepare("select * from descripcion_valor order by id asc limit 1;");
            $registroAMostrar->execute();
            $registroEncontrado = $registroAMostrar->fetch();
            return new DescripcionValor($registroEncontrado['id'], $registroEncontrado['titulo'],$registroEncontrado['descripcion'] );
        }

        // *Método para actualizar el registro de Descripcion Valor
        public static function actualizarDescripcionValor($titulo,$descripcion,$id){
            $conexion = conexion::conexionBD();
            $registroAActualizar = $conexion->prepare("UPDATE descripcion_valor set titulo=?, descripcion=? where id=?");
            $registroAActualizar->execute(array($titulo,$descripcion,$id));
        }
    }