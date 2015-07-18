<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Categoria.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('1');

$administrarUsuario->verificarSesion($usuariosPermitidos);


    $categoria = new Categoria();
    $categoria->mostrarFormulario();
