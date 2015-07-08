<?php
require_once realpath(dirname(__FILE__) . '/../clases/Empresa.php');

$empresa = new Empresa();
$datosEmpresa = $_POST;
$empresa->guardarEmpresa($datosEmpresa);