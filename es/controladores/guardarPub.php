<?php
require_once realpath(dirname(__FILE__) . '/../clases/Publicaciones.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3','4');
$admin ->verificarSesion($usuariosPermitidos);

$publicacion = new Publicaciones();
$utilidades = new Utilidades();
$datosPub = $_POST;
$publicacion->guardarPub($datosPub);
$utilidades->Redireccionar('controladores/publicar.php');