<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Reportes.php');

$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$reporte = new Reportes();
$reporte -> reporteUsuarioEmpre();