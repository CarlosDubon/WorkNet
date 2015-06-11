<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Evento.php');

$evento = new Evento();
$evento->mostrarFormulario();
