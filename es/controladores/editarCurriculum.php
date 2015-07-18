<?php
require_once realpath (dirname (__FILE__).'/../clases/AdministrarUsuarios.php');  
require_once realpath (dirname (__FILE__).'/../clases/Curriculum.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos= array('4');
$admin -> verificarSesion($usuariosPermitidos);

$Curriculum = new Curriculum();
$datos = $_POST;
$Curriculum->editarCurriculum($datos);
 