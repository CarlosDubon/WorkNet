<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Perfil.php');

$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('3');

$administrarUsuario->verificarSesion($usuariosPermitidos);


    $perfil = new Perfil();
    $perfil->mostrarPerfilTrabajador();