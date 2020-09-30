<?php  
  require_once "nucleo/configGeneral.php";
  require_once "controlador/vistasControlador.php";

  $plantilla = new vistasControlador();
  $plantilla->getPlantilla_Controlador();
