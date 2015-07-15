<?php
require_once realpath(dirname(__FILE__) . '/../clases/Portafolio.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$p = new Portafolio();
$estrella = $_POST['numero'];
$p->votarEstrella($estrella);
