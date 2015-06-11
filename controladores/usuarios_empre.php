<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2');

$administrarUsuario->verificarSesion($usuariosPermitidos);
$usuarios = new Usuario();
$usuarios-> mostrarUsuarioTrabajador();

?>