<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');


$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('4');
$admin ->verificarSesion($usuariosPermitidos);

$CambiarContraUsuario = new Usuario();
$datosContraUsuario = $_POST;
$CambiarContraUsuario->CambiarContraUsuario($datosContraUsuario);