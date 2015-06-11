<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Ofertas.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3','4');

$administrarUsuario->verificarSesion($usuariosPermitidos);
$ofertas = new Ofertas();
$ofertas->mostrarOfertasUsuario();