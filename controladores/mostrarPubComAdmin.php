<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Comentarios.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('1','2','3','4');

$administrarUsuario->verificarSesion($usuariosPermitidos);
$com = new Comentarios();
$idPub=$_GET['idPub'];

$com->mostrarPubComAdmin($idPub);
