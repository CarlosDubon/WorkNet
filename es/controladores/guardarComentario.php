<?php
require_once realpath(dirname(__FILE__) . '/../clases/Comentarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('1','2','3','4');
$admin ->verificarSesion($usuariosPermitidos);

$comentarios = new Comentarios();
$coment = $_POST;
$comentarios->guardarComentario($coment);
