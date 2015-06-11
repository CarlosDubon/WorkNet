<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Amigos.php');


$administrarUsuario = new AdministrarUsuarios();
$amigos = new Amigos();

$usuariosPermitidos = array('2','3','4');
$administrarUsuario->verificarSesion($usuariosPermitidos);
$amigos->VerAmigos();