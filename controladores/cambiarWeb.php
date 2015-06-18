<?php

require_once realpath(dirname(__FILE__) . '/../clases/Perfil.php');


$perfil = new Perfil();
$editor = $_POST;
$perfil->editarWeb($editor);