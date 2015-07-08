<?php

require_once realpath(dirname(__FILE__) . '/../clases/Perfil.php');


$perfil = new Perfil();
$archivo = $_FILES;
$perfil->subirFotoUsuario($archivo);