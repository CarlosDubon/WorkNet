<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Buscar.php');

$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('1','2','3','4');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$get = new Buscar();
$get->buscarCategiras();