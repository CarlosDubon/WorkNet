<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Publicaciones.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('1','2','3','4');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$p = new Publicaciones();
$id = $_GET['idPub'];

$p->work($id);