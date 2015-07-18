<?php
require_once realpath(dirname(__FILE__) . '/../clases/Curriculum.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('4');
$admin ->verificarSesion($usuariosPermitidos);

$curriculum = new Curriculum();
$datos = $_POST;
$curriculum->crearCurriculum($datos);