<?php
require_once realpath(dirname(__FILE__) . '/../clases/Evento.php');

$Evento = new Evento();
$datosEvento = $_POST;
$Evento->guardarEvento($datosEvento);