<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');

$CambiarContraEmpre = new Usuario();
$datosContraEmpre = $_POST;
$CambiarContraEmpre->CambiarContraEmpre($datosContraEmpre);