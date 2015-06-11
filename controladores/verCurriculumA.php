<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Curriculum.php');



$administrarUsuario = new AdministrarUsuarios();

$usuariosPermitidos = array('2','3','4');
$administrarUsuario->verificarSesion($usuariosPermitidos);

$c = new Curriculum();
$C=$_GET['idCuenta_cuenta'];

$c->verCurriculumA($C);