<?php
require_once realpath(dirname(__FILE__) . '/../clases/Evento.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3');
$admin ->verificarSesion($usuariosPermitidos);

$Evento = new Evento();
$datosEvento = $_POST;
$Evento->guardarEvento($datosEvento);