<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('3');
$admin ->verificarSesion($usuariosPermitidos);

$CambiarContraTrabajador = new Usuario();
$datosContraTrabajador = $_POST;
$CambiarContraTrabajador->CambiarContraTrabajador($datosContraTrabajador);