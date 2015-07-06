<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Curriculum.php');


$administrarUsuario = new AdministrarUsuarios();
$c = new Curriculum();
$usuariosPermitidos = array('4');
$administrarUsuario->verificarSesion($usuariosPermitidos);

$c->mostrarCurriculum();