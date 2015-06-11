<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Publicaciones.php');


$administrarUsuario = new AdministrarUsuarios();
$pub = new Publicaciones();
$usuariosPermitidos = array('2','3','4');
$administrarUsuario->verificarSesion($usuariosPermitidos);

$pub->mostrarPub();

        
