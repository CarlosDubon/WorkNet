<?php

require_once realpath(dirname(__FILE__) . '/../clases/Perfil.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('4');
$admin ->verificarSesion($usuariosPermitidos);

$perfil = new Perfil();
$editor = $_POST;
$perfil->editarCorreoUsuario($editor);