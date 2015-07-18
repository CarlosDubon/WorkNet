<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('1');
$admin ->verificarSesion($usuariosPermitidos);


$CambiarContraAdmin = new Usuario();
$datosContraAdmin = $_POST;
$CambiarContraAdmin->CambiarContraAdmin($datosContraAdmin);