<?php
require_once realpath(dirname(__FILE__) . '/../clases/Publicaciones.php');

$publicacion = new Publicaciones();
$comentarios = $_POST;
$publicacion->guardarComentarioPub($comentarios);
