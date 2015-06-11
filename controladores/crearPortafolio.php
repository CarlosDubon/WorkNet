<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Portafolio.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2');

$administrarUsuario->verificarSesion($usuariosPermitidos);


    $portafolio = new Portafolio();
    $portafolio->verArchivos();
