<?php
require_once realpath(dirname(__FILE__) . '/../clases/Categoria.php');
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');

$admin = new AdministrarUsuarios();
$usuariosPermitidos = array('1');
$admin ->verificarSesion($usuariosPermitidos);

$categoria = new Categoria();
$datosCategoria = $_POST;
$categoria->guardarcategoria($datosCategoria);