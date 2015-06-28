<?php
require_once realpath(dirname(__FILE__) . '/../clases/Aplicadores.php');

$app = new Aplicadores();
$a = $_POST;
$app->guardarAplicacion($a);
