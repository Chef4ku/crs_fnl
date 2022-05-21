<?php

require_once "modelos/form.modelos.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/form.controlador.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrGetPlantilla();