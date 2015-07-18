<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Publicaciones.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('1','2');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$pub = new Publicaciones();
$id = $_GET['idPub'];
$pub->eliminarPub($id);