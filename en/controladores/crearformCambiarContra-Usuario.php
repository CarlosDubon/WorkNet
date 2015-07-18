<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('4');

$administrarUsuario->verificarSesion($usuariosPermitidos);


    $CambiarContraUsuario = new Usuario();
    $CambiarContraUsuario->mostrarFormularioCambiarContUsuario();
