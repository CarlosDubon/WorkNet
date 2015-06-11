<?php
require_once realpath(dirname(__FILE__) . '/../clases/Ofertas.php');

$ofertas = new Ofertas();
$datosOferta = $_POST;
$ofertas->guardarOfertas($datosOferta);