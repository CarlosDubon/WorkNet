<?php
require_once realpath(dirname(__FILE__) . '/../clases/Trabajador.php');

$trabajador = new Trabajador();
$datosTrabajador = $_POST;
$trabajador->guardarTrabajador($datosTrabajador);