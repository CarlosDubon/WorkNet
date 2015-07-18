<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Perfil.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2');
$admin->verificarSesion($usuariosPermitidos);

$perfil = new Perfil();
$editor = $_POST;
$perfil->editarCategoria($editor);
