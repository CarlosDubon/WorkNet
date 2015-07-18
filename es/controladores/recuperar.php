<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/reiniciarPass.php');


$pass = new reiniciarPass();
$olvido = $_POST;
$pass->generarLinkTemporal();

        
