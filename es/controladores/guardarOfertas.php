<?php
require_once realpath(dirname(__FILE__) . '/../clases/Ofertas.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2');
$admin ->verificarSesion($usuariosPermitidos);

$ofertas = new Ofertas();
$datosOferta = $_POST;
$ofertas->guardarOfertas($datosOferta);