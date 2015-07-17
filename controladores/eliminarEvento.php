<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Evento.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$cat = new Evento();
$id = $_GET['idEventos'];

$cat->eliminarEvento($id);