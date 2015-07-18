<?php
require_once realpath(dirname(__FILE__) . '/../clases/Buscar.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3','4');
$admin ->verificarSesion($usuariosPermitidos);

$Buscar = new Buscar();
$categoria = $_GET['NombreCat'];
$Buscar->verUsuariosPorCat($categoria);