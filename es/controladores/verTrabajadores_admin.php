<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');

$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('1');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$usuarios = new Usuario();
$id = $_GET['idCuenta'];
$usuarios->verTrabajadoresAdmin($id);