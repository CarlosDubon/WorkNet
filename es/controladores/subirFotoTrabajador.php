<?php

require_once realpath(dirname(__FILE__) . '/../clases/Perfil.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('3');
$admin ->verificarSesion($usuariosPermitidos);

$perfil = new Perfil();
$archivo = $_FILES;
$perfil->subirFotoTrabajador($archivo);