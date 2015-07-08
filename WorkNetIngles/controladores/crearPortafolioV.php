<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Sesion.php');
require_once realpath(dirname(__FILE__) . '/../clases/Portafolio.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3','4');

$administrarUsuario->verificarSesion($usuariosPermitidos);

    
    
    $portafolio = new Portafolio();
    $id=$_GET['cuenta_idCuenta'];

    $portafolio->VerArchivosAmigo($id);
    

