<?php

include_once("modelos/Contenido.php");
include_once("config/conexion.php");
include_once("modelos/DescripcionPrograma.php");

class Programa extends Contenido
{
    private $imagen;
    private $descripcionProgramaId;
    private ?DescripcionPrograma $descripcionPrograma;

    public function __construct($id=null, $titulo='', $descripcion='', $imagen='', $descripcionProgramaId=null, ?DescripcionPrograma $descripcionPrograma=null)
    {
        $this->imagen = $imagen;
        $this->descripcionProgramaId = $descripcionProgramaId;
        $this->descripcionPrograma = $descripcionPrograma;
        return parent::__construct($id, $titulo, $descripcion);
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Get the value of descripcionProgramaId
     */
    public function getDescripcionProgramaId()
    {
        return $this->descripcionProgramaId;
    }

    /**
     * Get the value of descripcionPrograma
     */
    public function getDescripcionPrograma(): DescripcionPrograma
    {
        return $this->descripcionPrograma;
    }
    
    public function setImagen($value) {
		$this->imagen = $value;
	}

	public function setDescripcionProgramaId($value) {
		$this->descripcionProgramaId = $value;
	}


    // /**
    //  * Get the value of contenido
    //  */
    // public function getContenido(): Contenido
    // {
    //     return $this->contenido;
    // }


    #[Override]
    public function validar(array $files = []): bool
    {
        $valido = parent::validar();

        if (empty($this->descripcionProgramaId)) {
            $this->errores['descripcion_programa_id'] = "Debe seleccionar una descripción de programa";
            $valido = false;
        }

        $hayArchivo = isset($files['imagen']) && $files['imagen']['error'] !== 4;

        if (!$hayArchivo) {
            $this->errores['imagen'] = "Debe ingresar una imagen";
            $valido = false;
        }

        if ($hayArchivo) {
            // *Recojo los datos de la imagen recibida
            $mime = mime_content_type($files['imagen']['tmp_name']);
            $permitidos = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];

            if (!in_array($mime, $permitidos)) {
                $this->errores['imagen'] = "Fomato no permitido, solo se permite .jpeg, png, webp, jpg ";
                $valido = false;
            }
        }
        return $valido;
    }

    // *Función o método para registrar un programa
    public static function registrarPrograma($titulo, $descripcion, $rutaImagen, $descripcionProgramaId)
    {

        $conexion = conexion::conexionBD();
        $registroAGuardar = $conexion->prepare("INSERT into programas(titulo,descripcion,imagen,descripcion_programa_id) values(?,?,?,?)");
        $registroAGuardar->execute(array($titulo, $descripcion, $rutaImagen, $descripcionProgramaId));
    }

    // *Función para mostrar el registro de ambas tablas, tanto descripcion programa como programa

    public static function mostrarProgramas()
    {
        $conexion = conexion::conexionBD();
        $consultaSQL = "SELECT dp.id as ID, dp.titulo as TITULO, 
                            dp.descripcion as DESCRIPCION,
		                    p.id as id, p.titulo as titulo, p.descripcion as descripcion, p.imagen as imagen, p.descripcion_programa_id as descripcion_programa
                            from descripcion_programa as dp inner join programas as p on dp.id = p.descripcion_programa_id";

        $registrosAMostrar = $conexion->query($consultaSQL);

        $registrosEncontrados = [];

        foreach ($registrosAMostrar->fetchAll() as $registro) {
            $objDescripcionPrograma = new DescripcionPrograma($registro['ID'], $registro['TITULO'], $registro['DESCRIPCION']);

            $objPrograma = new Programa($registro['id'], $registro['titulo'], $registro['descripcion'], $registro['imagen'], $registro['descripcion_programa'], $objDescripcionPrograma);

            // *Estamos llenando el arreglo definido, por eso se coloca corchetes 
            $registrosEncontrados[] = $objPrograma;
        }

        return $registrosEncontrados;
    }

    // *Método para retornar el primer registro de la tabla programa
    public static function mostrarRegistroPrograma($id)
    {
        $conexion = conexion::conexionBD();
        $registroAMostrar = $conexion->prepare("select * from programas where id=?");
        $registroAMostrar->execute(array($id));
        $registroEncontrado = $registroAMostrar->fetch();
        return $registroEncontrado;
    }

    // *Método para actualizar el registro de programa
    public static function actualizarPrograma($titulo, $descripcion, $imagen, $id)
    {
        $conexion = conexion::conexionBD();
        $registroAActualizar = $conexion->prepare("UPDATE programas set titulo=?, descripcion=?, imagen=? where id=?");
        $registroAActualizar->execute(array($titulo, $descripcion, $imagen, $id));
    }

    // *Método para eliminar un registro de Programa
    public static function eliminarPrograma($id)
    {
        $conexion = conexion::conexionBD();
        $registroAEliminar = $conexion->prepare("DELETE from programas where id=?");
        $registroAEliminar->execute(array($id));
    }


	
}