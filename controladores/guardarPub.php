<?php
require_once realpath(dirname(__FILE__) . '/../clases/Publicaciones.php');

$publicacion = new Publicaciones();
$utilidades = new Utilidades();
$datosPub = $_POST;
$publicacion->guardarPub($datosPub);
$utilidades->Redireccionar('controladores/publicar.php');