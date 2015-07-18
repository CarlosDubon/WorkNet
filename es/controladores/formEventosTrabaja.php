<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Evento.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3');
$admin ->verificarSesion($usuariosPermitidos);

$evento = new Evento();
$evento->mostrarFormularioTrabaja();
