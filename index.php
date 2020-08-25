<?php
/**
@grcarvajal grcarvajal@gmail.com **Gildardo Restrepo Carvajal**
28/04/2020 ventas suscripcion
 */
require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";
require_once "backoffice/controladores/usuarios.controlador.php";
require_once "backoffice/extensiones/vendor/autoload.php";

////Modelos
require_once "backoffice/modelos/usuarios.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
