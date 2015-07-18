<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Curriculum.php');

$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('4');

$administrarUsuario->verificarSesion($usuariosPermitidos);


    $curriculum = new Curriculum();
    $curriculum->mostrarFormulario();