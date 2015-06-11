<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');

$CambiarContraUsuario = new Usuario();
$datosContraUsuario = $_POST;
$CambiarContraUsuario->CambiarContraUsuario($datosContraUsuario);