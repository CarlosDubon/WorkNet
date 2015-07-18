<?php

require_once realpath(dirname(__FILE__) . '/../clases/Portafolio.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2');
$admin ->verificarSesion($usuariosPermitidos);

$portafolio = new Portafolio();
$archivo = $_FILES;
$portafolio->subirArchivo($archivo);