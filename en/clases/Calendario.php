<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');

class Calendario{
    

    public function mostrarFormulario(){
        $plantilla = new Plantilla();
        $plantilla->verPagina ('calendarioEmpresa');
    }
}