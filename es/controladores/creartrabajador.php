<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Trabajador.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2');

$administrarUsuario->verificarSesion($usuariosPermitidos);

    
    $trabajador = new Trabajador();
    $trabajador->mostrarFormulario();
