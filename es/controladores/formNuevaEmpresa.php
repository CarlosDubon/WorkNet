<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Empresa.php');
$empresa = new Empresa();
$empresa->mostrarFormulario();
