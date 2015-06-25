<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Valoracion.php');



$administrarUsuario = new AdministrarUsuarios();

$usuariosPermitidos = array('2','3','4');
$administrarUsuario->verificarSesion($usuariosPermitidos);

$val = new Valoracion();
$id=$_GET['idPortafolio'];

$val->votarUnaEstrella($id);