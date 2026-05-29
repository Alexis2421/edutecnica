<?php
// print_r($controlador);

if (strpos($controlador, "-") !== false) {
  $controlador = str_replace("-", " ", $controlador);
  $controlador = ucwords($controlador);
  $controlador = "Controlador". str_replace(" ", "", $controlador);
  // print_r($controlador);
} else {
  // *función para cambiar la primera letra a mayúscula (ucfirst)
  $controlador = "Controlador" . ucfirst($controlador);
  // print_r($controlador);
}

// print_r($controlador);


include_once("controladores/" . $controlador . ".php");


$objControlador = new $controlador();
$objControlador->$accion();
   

  // $controlador->error();