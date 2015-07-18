<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Usuario.php');

$usuario = new Usuario();
$usuario->mostrarFormulario();
