<?php

require_once realpath(dirname(__FILE__) . '/../clases/Portafolio.php');


$portafolio = new Portafolio();
$archivo = $_FILES;
$portafolio->subirArchivo($archivo);