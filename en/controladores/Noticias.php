<?php
require_once realpath (dirname (__FILE__).'/../clases/AdministrarUsuarios.php');  
require_once realpath (dirname (__FILE__).'/../clases/Plantilla.php');  


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3','4');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$plan = new Plantilla();
$plan->verPagina();

?>