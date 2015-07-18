<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Denuncias.php');


$administrarUsuario = new AdministrarUsuarios();
$de = new Denuncias();
$usuariosPermitidos = array('2','3','4');
$administrarUsuario->verificarSesion($usuariosPermitidos);
$d = $_POST;
$de->guardarQueja($d);

        
