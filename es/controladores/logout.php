<?php
require_once realpath (dirname (__FILE__).'/../clases/AdministrarUsuarios.php');  
$administrarUsuario = new AdministrarUsuarios();
$administrarUsuario->logout();
?>