<?php

include_once("modelos/Contenido.php");
include_once("config/conexion.php");
include_once("modelos/DescripcionGaleria.php");

class Galeria extends Contenido
{
    private $imagen;
    private $descripcionGaleriaId;
    private ?DescripcionGaleria $descripcionGaleria;

    public function __construct($id=null, $titulo='', $descripcion='', $imagen='', $descripcionGaleriaId=null, ?DescripcionGaleria $descripcionGaleria=null)
    {
        $this->imagen = $imagen;
        $this->descripcionGaleriaId = $descripcionGaleriaId;
        $this->descripcionGaleria = $descripcionGaleria;
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
     * Get the value of descripcionGaleriaId
     */
    public function getDescripcionGaleriaId()
    {
        return $this->descripcionGaleriaId;
    }

    /**
     * Get the value of descripcionGaleria
     */
    public function getDescripcionGaleria(): DescripcionGaleria
    {
        return $this->descripcionGaleria;
    }

    public function setDescripcionGaleriaId($value)
    {
        $this->descripcionGaleriaId = $value;
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

        if (empty($this->descripcionGaleriaId)) {
            $this->errores['descripcion_galeria_id'] = "Debe seleccionar una descripción de galeria";
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

    // *Función o método para registrar galeria
    public static function registrarGaleria($titulo, $descripcion, $rutaImagen, $descripcionGaleriaId)
    {

        $conexion = conexion::conexionBD();
        $registroAGuardar = $conexion->prepare("INSERT into galeria(titulo,descripcion,imagen,descripcion_galeria_id) values(?,?,?,?)");
        $registroAGuardar->execute(array($titulo, $descripcion, $rutaImagen, $descripcionGaleriaId));
    }

    // *Función para mostrar el registro de ambas tablas, tanto descripcion galeria como galeria

    public static function mostrarGaleria()
    {
        $conexion = conexion::conexionBD();
        $consultaSQL = "SELECT dp.id as ID, dp.titulo as TITULO, 
                            dp.descripcion as DESCRIPCION,
		                    p.id as id, p.titulo as titulo, p.descripcion as descripcion, p.imagen as imagen, p.descripcion_galeria_id as descripcion_galeria
                            from descripcion_galeria as dp inner join galeria as p on dp.id = p.descripcion_galeria_id";

        $registrosAMostrar = $conexion->query($consultaSQL);

        $registrosEncontrados = [];

        foreach ($registrosAMostrar->fetchAll() as $registro) {
            $objDescripcionGaleria = new DescripcionGaleria($registro['ID'], $registro['TITULO'], $registro['DESCRIPCION']);

            $objGaleria = new Galeria($registro['id'], $registro['titulo'], $registro['descripcion'], $registro['imagen'], $registro['descripcion_galeria'], $objDescripcionGaleria);

            // *Estamos llenando el arreglo definido, por eso se coloca corchetes 
            $registrosEncontrados[] = $objGaleria;
        }

        return $registrosEncontrados;
    }

    // *Método para retornar el registro de la tabla galeria
    public static function mostrarRegistroGaleria($id)
    {
        $conexion = conexion::conexionBD();
        $registroAMostrar = $conexion->prepare("select * from galeria where id=?");
        $registroAMostrar->execute(array($id));
        $registroEncontrado = $registroAMostrar->fetch();
        return $registroEncontrado;
    }

    // *Método para actualizar el registro de galeria
    public static function actualizarGaleria($titulo, $descripcion, $imagen, $id)
    {
        $conexion = conexion::conexionBD();
        $registroAActualizar = $conexion->prepare("UPDATE galeria set titulo=?, descripcion=?, imagen=? where id=?");
        $registroAActualizar->execute(array($titulo, $descripcion, $imagen, $id));
    }

    // *Método para eliminar un registro de Galeria
    public static function eliminarGaleria($id)
    {
        $conexion = conexion::conexionBD();
        $registroAEliminar = $conexion->prepare("DELETE from galeria where id=?");
        $registroAEliminar->execute(array($id));
    }
}
