<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Denuncias.php');


$administrarUsuario = new AdministrarUsuarios();

$usuariosPermitidos = array('1');
$administrarUsuario->verificarSesion($usuariosPermitidos);

$denuncias = new Denuncias();
$denuncias->mostrarQuejas();