<?php
require_once realpath(dirname(__FILE__) . '/../clases/Categoria.php');

$categoria = new Categoria();
$datosCategoria = $_POST;
$categoria->guardarcategoria($datosCategoria);