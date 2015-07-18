<?php
require_once realpath (dirname (__FILE__).'/../clases/AdministrarUsuarios.php');  
require_once realpath (dirname (__FILE__).'/../clases/Ofertas.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos= array('2');
$admin -> verificarSesion($usuariosPermitidos);

$oferta = new Ofertas();
$datosOferta = $_POST;
$oferta->editarOferta($datosOferta);
 