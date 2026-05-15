<?php

include_once("config/conexion.php");
include_once("modelos/Contenido.php");
include_once("modelos/DescripcionValor.php");

class Valor extends Contenido
{
    // *Atributos
    private $descripcionValorId;
    private ?DescripcionValor $descripcionValor;

    // *Constructor
    public function __construct($id=null, $titulo='', $descripcion='', $descripcionValorId=null, ?DescripcionValor $descripcionValor = null)
    {
        $this->descripcionValorId = $descripcionValorId;
        $this->descripcionValor = $descripcionValor;
        return parent::__construct($id, $titulo, $descripcion);
    }


    /**
     * Get the value of descripcionValorId
     */

    public function getDescripcionValorId()
    {
        return $this->descripcionValorId;
    }

    public function getDescripcionValor(): DescripcionValor
    {
        return $this->descripcionValor;
    }

    public function setDescripcionValorId($descripcionValorId) {
		$this->descripcionValorId = $descripcionValorId;
	}

	public function setDescripcionValor(DescripcionValor $value) {
		$this->descripcionValor = $value;
	}

    #[Override]
    public function validar(): bool
    {
        $valido =  parent::validar();

        if (empty($this->descripcionValorId)) {
            $this->errores['descripcion_valor_id'] = "Debe seleccionar una descripción de valor";
            $valido = false;
        }
        return $valido;
    }
    

    // *Función para registrar un valor con sus datos en la BD
    public static function registrarValor($titulo, $descripcion, $descripcionValorId)
    {
        $conexion = conexion::conexionBD();
        $registroAGuardar = $conexion->prepare("INSERT into valores(titulo,descripcion,descripcion_valor_id) values (?,?,?)");
        $registroAGuardar->execute(array($titulo, $descripcion, $descripcionValorId));
    }

    // *Función o método para mostrar todos los registros guardados en la base de datos
    public static function mostrarValores()
    {
        $conexion = conexion::conexionBD();
        $consultaSQL = "SELECT dv.id as ID, dv.titulo as TITULO, dv.descripcion as DESCRIPCION,
                            v.id as id, v.titulo titulo, v.descripcion as descripcion, v.descripcion_valor_id as descripcion_valor
                            from descripcion_valor as dv inner join valores as v on dv.id = v.descripcion_valor_id";
        $registrosAMostrar = $conexion->query($consultaSQL);

        $listaDeValores = [];

        foreach ($registrosAMostrar->fetchAll() as $valor) {
            $objDescripcionValor = new DescripcionValor($valor['ID'], $valor['TITULO'], $valor['DESCRIPCION']);
            $objValor = new Valor($valor['id'], $valor['titulo'], $valor['descripcion'], $valor['descripcion_valor'], $objDescripcionValor);
            $listaDeValores[] = $objValor;
        }
        return $listaDeValores;
    }

    // *Función para eliminar un registro de Valores
    public static function eliminarValor($id)
    {
        $conexion = conexion::conexionBD();
        $registroAEliminar = $conexion->prepare("DELETE from valores where id=?");
        $registroAEliminar->execute(array($id));
    }

    // *Función para filtrar un registro por medio del id seleccionado
    public static function buscarValor($id)
    {
        $conexion = conexion::conexionBD();
        $registroABuscar = $conexion->prepare("SELECT * from valores where id=?");
        $registroABuscar->execute(array($id));
        $registroEncontrado = $registroABuscar->fetch();
        return $registroEncontrado;
    }

    // *Función para actualizar el registro seleccionado de valor
    public static function actualizarValor($titulo, $descripcion, $id)
    {
        $conexion = conexion::conexionBD();
        $registroAActualizar = $conexion->prepare("UPDATE valores Set titulo=?, descripcion=? where id=?");
        $registroAActualizar->execute(array($titulo, $descripcion, $id));
    }

}