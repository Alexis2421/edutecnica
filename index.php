<?php
   session_start();
  
  // *Recibiendo parámetros del navegador
  if (isset($_GET['controlador']) && isset($_GET['accion']) ) {

    // *En caso de que los parámetros no estén vacíos, le pasamos los de la URL
    if ( $_GET['controlador'] != "" && $_GET['accion'] != "" ) {
      $controlador = $_GET['controlador'];
      $accion = $_GET['accion'];

      // print_r($controlador);
      // print_r($accion);
    }else {
       // *Inicializamos los parámetros por defecto
      $controlador = "Paginas";
      $accion = "inicio";
    }

  }

  $muestroPlantilla = true;


  if ($controlador=="paginas" && $accion=="web") {
    $muestroPlantilla = false;
  }

  if ($muestroPlantilla) {
    include_once("vistas/plantilla.php");
  }else {
    include_once("config/ruteador.php");
  }
   
   

