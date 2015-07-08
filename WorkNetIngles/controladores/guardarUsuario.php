<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');

$usuario = new Usuario();
$datosUsuario = $_POST;
$usuario->guardarUsuario($datosUsuario);