<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');

$CambiarContraAdmin = new Usuario();
$datosContraAdmin = $_POST;
$CambiarContraAdmin->CambiarContraAdmin($datosContraAdmin);