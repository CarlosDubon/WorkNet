<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');

$CambiarContraTrabajador = new Usuario();
$datosContraTrabajador = $_POST;
$CambiarContraTrabajador->CambiarContraTrabajador($datosContraTrabajador);