<?php
require_once realpath (dirname (__FILE__).'/../clases/AdministrarUsuarios.php');  
require_once realpath (dirname (__FILE__).'/../clases/Plantilla.php');  
require_once realpath (dirname (__FILE__).'/../clases/Utilidades.php');  

if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
    $iniciarSesion = new AdministrarUsuarios();
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $usuario = trim($_POST['user']);
        $password = trim($_POST['pass']);
        $iniciarSesion->verificarUsuario($usuario, $password);
    }
}
else{
    $paginaInicio = new Plantilla();
    $paginaInicio->verPaginaSinPlantilla('index');
}
?>