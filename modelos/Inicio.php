<?php
    include_once("config/conexion.php");
    include_once("modelos/Contenido.php");

    class Inicio extends Contenido{
        // *Atributos
        private $imagen;
        

        public function __construct($id=null,$titulo = '',$descripcion= '',$imagen = '')
        {
           $this->imagen = $imagen; 
           parent::__construct($id,$titulo,$descripcion);
        }

        /**
         * Get the value of imagen
         */
        public function getImagen()
        {
                return $this->imagen;
        }

           /**
         * Set the value of imagen
         */
        public function setImagen($imagen): self
        {
                $this->imagen = $imagen;

                return $this;
        }


        #[Override]
        public function validar(array $files = [], $imagen = null): bool
        {
                $valido = parent::validar();

                $hayArchivo = isset($files['imagen_inicio']) && $files['imagen_inicio'] ['error'] !== 4;
                
                if (empty($imagen) && !$hayArchivo) {
                        $this->errores['imagen'] = "Debe ingresar una imagen";
                        $valido = false;
                }

                if ($hayArchivo) {
                        // *Recojo los datos de la imagen recibida
                        $mime = mime_content_type($files['imagen_inicio']['tmp_name']);
                        $permitidos = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];

                        if (!in_array($mime, $permitidos)) {
                                $this->errores['imagen'] = "Fomato no permitido, solo se permite .jpeg, png, webp, jpg ";
                                $valido = false;
                        } 
                }
                
               

                return $valido;
        }
        

        // *Método para retornar el primer registro de la tabla inicio
        public static function mostrarPrimerRegistroInicio(){
            $conexion = conexion::conexionBD();
            $registroAMostrar = $conexion->prepare("select * from inicio order by id asc limit 1;");
            $registroAMostrar->execute();
            $registroEncontrado = $registroAMostrar->fetch();
            return new Inicio($registroEncontrado['id'], $registroEncontrado['titulo'],$registroEncontrado['descripcion'],$registroEncontrado['imagen_inicio'] );
        }

        // *Método para actualizar el registro de inicio
        public static function actualizarInicio($titulo,$descripcion,$imagen,$id){
            $conexion = conexion::conexionBD();
            $registroAActualizar = $conexion->prepare("UPDATE inicio set titulo=?, descripcion=?, imagen_inicio=? where id=?");
            $registroAActualizar->execute(array($titulo,$descripcion,$imagen,$id));
        }

     
    }