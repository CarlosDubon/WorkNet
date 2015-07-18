<?php
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2');
$admin ->verificarSesion($usuariosPermitidos);

$CambiarContraEmpre = new Usuario();
$datosContraEmpre = $_POST;
$CambiarContraEmpre->CambiarContraEmpre($datosContraEmpre);