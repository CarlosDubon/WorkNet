<?php
require_once realpath(dirname(__FILE__) . '/../clases/Curriculum.php');

$curriculum = new Curriculum();
$datos = $_POST;
$curriculum->crearCurriculum($datos);