<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Ofertas.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('1','2');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$ofertas = new Ofertas();
$id = $_GET['idOfertas'];

$ofertas->eliminarOferta($id);