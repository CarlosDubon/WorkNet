<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Notificaciones.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3','4');
$admin->verificarSesion($usuariosPermitidos);

$noti = new Notificaciones();
$id = $_GET['idSoli'];
$noti->eliminarNotifi($id);