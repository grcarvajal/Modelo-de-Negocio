<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";
require_once "controladores/general.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/mdn.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/mdn.modelo.php";

//extensiones para generar PDF




$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();