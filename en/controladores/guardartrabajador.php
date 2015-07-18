<?php
require_once realpath(dirname(__FILE__) . '/../clases/Trabajador.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2');
$admin ->verificarSesion($usuariosPermitidos);

$trabajador = new Trabajador();
$datosTrabajador = $_POST;
$trabajador->guardarTrabajador($datosTrabajador);