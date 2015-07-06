<?php
require_once realpath(dirname(__FILE__) . '/../clases/Aplicadores.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('4');
$admin ->verificarSesion($usuariosPermitidos);

$app = new Aplicadores();
$a = $_POST;
$app->guardarAplicacion($a);
