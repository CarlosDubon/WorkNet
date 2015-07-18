<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Amigos.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3','4');

$administrarUsuario->verificarSesion($usuariosPermitidos);
$amigo = new Amigos();
$id=$_GET['idCuenta'];

$amigo->eliminarAmigo($id);