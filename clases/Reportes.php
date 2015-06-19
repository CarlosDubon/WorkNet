<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
include_once ('../vistas/recursos/fpdf/fpdf.php');

class Reportes{

    public function reporteUsuario(){
        $db = new MySQL();
        $sesion = new Sesion();
        $pdf = new FPDF();

        $pdf->AddPage();
        $pdf->Image('vistas/recursos/images/reporteUsuario.jpg',10,10,-300);
        $pdf->Output();
    }
}