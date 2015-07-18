<?php
require_once realpath(dirname(__FILE__) . '/../clases/Portafolio.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$p = new Portafolio();
$idPorta = $_GET['idPortafolio'];
$p->votarEstrella($idPorta);
