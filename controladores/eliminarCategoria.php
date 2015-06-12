<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/Categoria.php');


$administrarUsuario = new AdministrarUsuarios();
$usuariosPermitidos = array('1','2');

$administrarUsuario->verificarSesion($usuariosPermitidos);

$cat = new Categoria();
$id = $_GET['idCategorias'];

$cat->eliminarCategoria($id);