<?php
require_once realpath(dirname(__FILE__) . '/../clases/Comentarios.php');

$comentarios = new Comentarios();
$coment = $_POST;
$comentarios->guardarComentario($coment);
