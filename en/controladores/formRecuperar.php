<?php
require_once realpath(dirname(__FILE__) . '/../clases/reiniciarPass.php');

$recuperar = new reiniciarPass();
$recuperar->mostrarForm();