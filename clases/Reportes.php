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
        $pdf->Image('../vistas/recursos/images/reporteUsuario.jpg',10,10,190);
        $pdf->SetFont('Arial', 'B', 10);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->SetXY($x, $y = 120);
        $pdf->MultiCell(15,7, 'ID', 1);
        $pdf->SetXY($x + 15,$y);
        $pdf->MultiCell(22,7, 'Usuario ', 1);
        $pdf->SetXY($x +37,$y);
        $pdf->MultiCell(22,7, 'Nombre', 1);
        $pdf->SetXY($x + 59,$y);
        $pdf->MultiCell(22,7, 'Apellido', 1);
        $pdf->SetXY($x + 81,$y);
        $pdf->MultiCell(75,7, 'Correo', 1, 'C');
        $pdf->SetXY($x + 156,$y);
        $pdf->MultiCell(22,7, 'Estado', 1);
        $query='Select idCuenta, Usuario, Nombre, Apellido, Correo, SitioWeb, Telefono, Estado FROM cuenta';
        $resul= $db->consulta($query);
        
        for($i=0; $i<count($resul); $i++){
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetXY($x, $y);
            $pdf->MultiCell(15, 7, $resul[$i]['idCuenta'],1,1,0);
            $pdf->SetXY($x+15, $y);
            $pdf->MultiCell(22, 7, $resul[$i]['Usuario'],1,1,0);
            $pdf->SetXY($x+37, $y);
            $pdf->MultiCell(22, 7, $resul[$i]['Nombre'],1,1,0);
            $pdf->SetXY($x+59, $y);
            $pdf->MultiCell(22, 7, $resul[$i]['Apellido'],1,1,0);
            $pdf->SetXY($x+81, $y);
            $pdf->MultiCell(75, 7, $resul[$i]['Correo'],1,1,0);
            $pdf->SetXY($x+156, $y);
            if($resul[$i]['Estado'] == '0'){
                $pdf->MultiCell(22, 7, 'Inactivo',1,1,0);
            }else{
                $pdf->MultiCell(22, 7, 'Activo',1,1,0);
            }
            
        }
        $Date = new DateTime();
        $DateNow = $Date->format('d-m-Y');
        $Hora = date("h:i");
        $Usuario= $sesion->obtenerVariableSesion('nombreUsuario');
        $pdf->SetY(265);
        $pdf->MultiCell(22,7,$DateNow);
        $pdf->SetY(269);
        $pdf->MultiCell(22,7,$Hora);
        $pdf->SetXY($x+120, $y=260);
        $pdf->MultiCell(120,7, utf8_decode('Usuario que emitió reporte:').$Usuario, 0,1,0);
        $pdf->Output();
    }
}


class ReporteEventos{

    public function reporteUsuario(){
        $db = new MySQL();
        $sesion = new Sesion();
        $pdf = new FPDF();

        $pdf->AddPage();
        $pdf->Image('../vistas/recursos/images/reporteUsuario.jpg',10,10,190);
        $pdf->SetFont('Arial', 'B', 10);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->SetXY($x, $y = 120);
        $pdf->MultiCell(15,7, 'ID', 1);
        $pdf->SetXY($x + 15,$y);
        $pdf->MultiCell(22,7, 'Usuario ', 1);
        $pdf->SetXY($x +37,$y);
        $pdf->MultiCell(22,7, 'Nombre', 1);
        $pdf->SetXY($x + 59,$y);
        $pdf->MultiCell(22,7, 'Apellido', 1);
        $pdf->SetXY($x + 81,$y);
        $pdf->MultiCell(75,7, 'Correo', 1, 'C');
        $pdf->SetXY($x + 156,$y);
        $pdf->MultiCell(22,7, 'Estado', 1);
        $query='Select idCuenta, Usuario, Nombre, Apellido, Correo, SitioWeb, Telefono, Estado FROM cuenta';
        $resul= $db->consulta($query);
        
        for($i=0; $i<count($resul); $i++){
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetXY($x, $y);
            $pdf->MultiCell(15, 7, $resul[$i]['idCuenta'],1,1,0);
            $pdf->SetXY($x+15, $y);
            $pdf->MultiCell(22, 7, $resul[$i]['Usuario'],1,1,0);
            $pdf->SetXY($x+37, $y);
            $pdf->MultiCell(22, 7, $resul[$i]['Nombre'],1,1,0);
            $pdf->SetXY($x+59, $y);
            $pdf->MultiCell(22, 7, $resul[$i]['Apellido'],1,1,0);
            $pdf->SetXY($x+81, $y);
            $pdf->MultiCell(75, 7, $resul[$i]['Correo'],1,1,0);
            $pdf->SetXY($x+156, $y);
            if($resul[$i]['Estado'] == '0'){
                $pdf->MultiCell(22, 7, 'Inactivo',1,1,0);
            }else{
                $pdf->MultiCell(22, 7, 'Activo',1,1,0);
            }
            
        }
        $Date = new DateTime();
        $DateNow = $Date->format('d-m-Y');
        $Hora = date("h:i");
        $Usuario= $sesion->obtenerVariableSesion('nombreUsuario');
        $pdf->SetY(265);
        $pdf->MultiCell(22,7,$DateNow);
        $pdf->SetY(269);
        $pdf->MultiCell(22,7,$Hora);
        $pdf->SetXY($x+120, $y=260);
        $pdf->MultiCell(120,7, utf8_decode('Usuario que emitió reporte:').$Usuario, 0,1,0);
        $pdf->Output();
    }
}