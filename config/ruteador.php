<?php
  // print_r($controlador);
  include_once("controladores/Controlador".$controlador.".php");

  // *función para cambiar la primera letra a mayúscula (ucfirst)
  $controlador = "Controlador".ucfirst($controlador);

  $objControlador = new $controlador();
  $objControlador->$accion();
   

  // $controlador->error();