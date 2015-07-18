<?php
require_once realpath(dirname(__FILE__).'/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__).'/../clases/Aplicadores.php');
    
    $admin = new AdministrarUsuarios();
    $usuariosPermitidos = array('2');
    $admin ->verificarSesion($usuariosPermitidos);

    $app = new Aplicadores();
    $idOfertas = $_GET['idOferta'];
    
    $app ->mostrarInteresados($idOfertas);