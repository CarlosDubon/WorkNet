<?php
require_once realpath(dirname(__FILE__) . '/../clases/Chat.php');

$chat = new Chat();
$datosMensaje = $_POST;
$chat->guardarMensaje($datosMensaje);