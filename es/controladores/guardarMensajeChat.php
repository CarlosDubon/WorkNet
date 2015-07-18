<?php
require_once realpath(dirname(__FILE__) . '/../clases/Chat.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('2','3','4');
$admin ->verificarSesion($usuariosPermitidos);

$chat = new Chat();
$datosMensaje = $_POST;
$chat->guardarMensaje($datosMensaje);