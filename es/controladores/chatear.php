<?php

require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Chat.php');


$administrarUsuario = new AdministrarUsuarios();
$chat = new Chat();
$usuariosPermitidos = array('2','3','4');
$administrarUsuario->verificarSesion($usuariosPermitidos);

if(count($_GET) > 0){
        $idAmigo = $_GET['idCuenta'];
        $chat->mostrarChat($idAmigo);
}        
if(count($_POST) > 0){
    $idAmigo = $_POST['idCuenta'];
    $chat->actualizarChat($idAmigo);
}