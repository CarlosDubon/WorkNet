<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
include_once ('../vistas/recursos/fpdf/fpdf.php');

class Reportes{
    public function mostrarMenu(){
        $plantilla = new Plantilla();
        
        
        $plantilla->verPagina('menuReportes');
    }

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
        $query='Select idCuenta, Usuario, Nombre, Apellido, Correo, SitioWeb, Telefono, Estado FROM cuenta WHERE idCuenta !=1';
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
        $pdf->MultiCell(120,7, utf8_decode('Reporte generado por: ').$Usuario, 0,1,0);
        $pdf->Output();
    }
    
    public function reportesEventos(){
        $db = new MySQL();
        $sesion = new Sesion();
        $pdf = new FPDF();

        $pdf->AddPage();
        $pdf->Image('../vistas/recursos/images/reporteEventos.jpg',10,10,190);
        $pdf->SetFont('Arial', 'B', 10);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->SetXY($x, $y = 120);
        $pdf->MultiCell(19,7, 'ID Evento', 1);
        $pdf->SetXY($x + 19,$y);
        $pdf->MultiCell(22,7, 'Usuario', 1);
        $pdf->SetXY($x +41,$y);
        $pdf->MultiCell(35,7, 'Fecha de Inicio', 1);
        $pdf->SetXY($x + 76,$y);
        $pdf->MultiCell(35,7,('Fecha Fin'), 1);
        $pdf->SetXY($x + 111,$y);
        $pdf->MultiCell(80,7, 'Nombre', 1);
        $query='Select eventos.idEventos, cuenta.Usuario, eventos.FechaIni, eventos.FechaFin, eventos.Nombre FROM eventos INNER JOIN cuenta ON eventos.idCuenta=cuenta.idCuenta';
        $resul= $db->consulta($query);
        
        for($i=0; $i<count($resul); $i++){
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetXY($x, $y);
            $pdf->MultiCell(19, 7, $resul[$i]['idEventos'],1,1,0);
            $pdf->SetXY($x+19, $y);
            $pdf->MultiCell(22, 7, $resul[$i]['Usuario'],1,1,0);
            $pdf->SetXY($x+41, $y);
            $pdf->MultiCell(35, 7, $resul[$i]['FechaIni'],1,1,0);
            $pdf->SetXY($x+76, $y);
            $pdf->MultiCell(35, 7, $resul[$i]['FechaFin'],1,1,0);
            $pdf->SetXY($x+111, $y);
            $pdf->MultiCell(80, 7, $resul[$i]['Nombre'],1,1,0);
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
        $pdf->MultiCell(120,7, utf8_decode('Reporte generado por: ').$Usuario, 0,1,0);
        $pdf->Output();
    }    
    public function reportesArchivos(){
        $db = new MySQL();
        $sesion = new Sesion();
        $pdf = new FPDF();

        $pdf->AddPage();
        $pdf->Image('../vistas/recursos/images/reporteArchivos.jpg',10,10,190);
        $pdf->SetFont('Arial', 'B', 10);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->SetXY($x, $y = 120);
        $pdf->MultiCell(20,7, 'ID Archivo', 1);
        $pdf->SetXY($x + 20,$y);
        $pdf->MultiCell(40,7, 'Nombre Archivo', 1);
        $pdf->SetXY($x +60,$y);
        $pdf->MultiCell(44,7, utf8_decode('Última actualización'), 1);
        $pdf->SetXY($x + 104,$y);
        $pdf->MultiCell(22,7,utf8_decode('Tamaño'), 1);
        $pdf->SetXY($x + 126,$y);
        $pdf->MultiCell(22,7, 'Usuario', 1);
        $query='Select portafolio.idPortafolio, portafolio.NombreArchivo, portafolio.FechaSubida, portafolio.Size, cuenta.Usuario FROM portafolio INNER JOIN cuenta ON portafolio.cuenta_idCuenta=cuenta.idCuenta';
        $resul= $db->consulta($query);
        
        for($i=0; $i<count($resul); $i++){
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetXY($x, $y);
        $pdf->MultiCell(20,7, $resul[$i]['idPortafolio'], 1);
        $pdf->SetXY($x + 20,$y);
        $pdf->MultiCell(40,7, $resul[$i]['NombreArchivo'], 1);
        $pdf->SetXY($x +60,$y);
        $pdf->MultiCell(44,7, $resul[$i]['FechaSubida'], 1);
        $pdf->SetXY($x + 104,$y);
        $pdf->MultiCell(22,7, $resul[$i]['Size'].' Kb', 1);
        $pdf->SetXY($x + 126,$y);
        $pdf->MultiCell(22,7, $resul[$i]['Usuario'], 1);
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
        $pdf->MultiCell(120,7, utf8_decode('Reporte generado por: ').$Usuario, 0,1,0);
        $pdf->Output();
    

    }
    public function reportesCategorias(){
        $db = new MySQL();
        $sesion = new Sesion();
        $pdf = new FPDF();

        $pdf->AddPage();
        $pdf->Image('../vistas/recursos/images/reporteArchivos.jpg',10,10,190);
        $pdf->SetFont('Arial', 'B', 10);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->SetXY($x, $y = 120);
        $pdf->MultiCell(33,7, utf8_decode('ID Categoría'), 1);
        $pdf->SetXY($x + 33,$y);
        $pdf->MultiCell(40,7,  utf8_decode('Nombre categoría'), 1);
        
        $query='Select idCategorias, NombreCat FROM categorias';
        $resul= $db->consulta($query);
        
        for($i=0; $i<count($resul); $i++){
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetXY($x, $y);
        $pdf->MultiCell(33,7, $resul[$i]['idCategorias'], 1);
        $pdf->SetXY($x + 33,$y);
        $pdf->MultiCell(40,7, $resul[$i]['NombreCat'], 1);
        
            
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
        $pdf->MultiCell(120,7, utf8_decode('Reporte generado por: ').$Usuario, 0,1,0);
        $pdf->Output();
    

    }
#################################################################################################################################################
    
        public function mostrarMenuEmpre(){
        $plantilla = new Plantilla();
        
        
        $plantilla->verPagina('menuReportesEmpre');
    }
    
     public function reporteUsuarioEmpre(){ 
        $db = new MySQL();
        $sesion = new Sesion();
        $pdf = new FPDF();
         
        $id = $sesion->obtenerVariableSesion('idUsuario'); 
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
        $query='Select idCuenta, Usuario, Nombre, Apellido, Correo, SitioWeb, Telefono, Estado FROM cuenta WHERE cuenta_cuenta ='.$id;
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
        $pdf->MultiCell(120,7, utf8_decode('Reporte generado por: ').$Usuario, 0,1,0);
        $pdf->Output();
    }
     public function reportesEventosEmpre(){
        $db = new MySQL();
        $sesion = new Sesion();
        $pdf = new FPDF();
         
        $id = $sesion->obtenerVariableSesion('idUsuario'); 
        $pdf->AddPage();
        $pdf->Image('../vistas/recursos/images/reporteEventos.jpg',10,10,190);
        $pdf->SetFont('Arial', 'B', 10);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->SetXY($x, $y = 120);
        $pdf->MultiCell(19,7, 'ID Evento', 1);
        $pdf->SetXY($x + 19,$y);
        $pdf->MultiCell(25,7,'Fecha Inicio',1);
        $pdf->SetXY($x+44 ,$y);
        $pdf->MultiCell(25,7,'Hora Inicio',1);
         $pdf->SetXY($x+69 ,$y);
        $pdf->MultiCell(25,7,'Fecha Fin',1);
         $pdf->SetXY($x+94 ,$y);
        $pdf->MultiCell(25,7,'Hora Fin',1);
          $pdf->SetXY($x+119 ,$y);
        $pdf->MultiCell(25,7,'Titulo',1);
          $pdf->SetXY($x+144 ,$y);
        $pdf->MultiCell(44,7,'Detalle',1);
        $query='Select idEventos,FechaIni,HoraIni, FechaFin,HoraFin, Nombre,Descripcion FROM eventos WHERE idCuenta='.$id;
        $resul= $db->consulta($query);
        
        for($i=0; $i<count($resul); $i++){
            $x = $pdf->GetX();
            $y = $pdf->GetY();
             $pdf->SetXY($x, $y);
            $pdf->MultiCell(19,7,$resul[$i]['idEventos'], 1);
            $pdf->SetXY($x + 19,$y);
            $pdf->MultiCell(25,7,$resul[$i]['FechaIni'],1);
            $pdf->SetXY($x+44 ,$y);
            $pdf->MultiCell(25,7,$resul[$i]['HoraIni'],1);
             $pdf->SetXY($x+69 ,$y);
            $pdf->MultiCell(25,7,$resul[$i]['FechaFin'],1);
             $pdf->SetXY($x+94 ,$y);
            $pdf->MultiCell(25,7,$resul[$i]['HoraFin'],1);
              $pdf->SetXY($x+119 ,$y);
            $pdf->MultiCell(25,7,$resul[$i]['Nombre'],1);
              $pdf->SetXY($x+144 ,$y);
            $pdf->MultiCell(44,7,$resul[$i]['Descripcion'],1);
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
        $pdf->MultiCell(120,7, utf8_decode('Reporte generado por: ').$Usuario, 0,1,0);
        $pdf->Output();
        
     }
    public function reportesArchivosEmpre(){
        $db = new MySQL();
        $sesion = new Sesion();
        $pdf = new FPDF();

        $id = $sesion->obtenerVariableSesion('idUsuario');
        $pdf->AddPage();
        $pdf->Image('../vistas/recursos/images/reporteArchivos.jpg',10,10,190);
        $pdf->SetFont('Arial', 'B', 10);
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->SetXY($x, $y = 120);
        $pdf->MultiCell(20,7, 'ID Archivo', 1);
        $pdf->SetXY($x + 20,$y);
        $pdf->MultiCell(40,7, 'Nombre Archivo', 1);
        $pdf->SetXY($x +60,$y);
        $pdf->MultiCell(44,7, utf8_decode('Última actualización'), 1);
        $pdf->SetXY($x + 104,$y);
        $pdf->MultiCell(22,7,utf8_decode('Tamaño'), 1);
        $query='Select idPortafolio, NombreArchivo, FechaSubida, Size FROM portafolio WHERE cuenta_idCuenta='.$id;
        $resul= $db->consulta($query);
        
        for($i=0; $i<count($resul); $i++){
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetXY($x, $y);
        $pdf->MultiCell(20,7, $resul[$i]['idPortafolio'], 1);
        $pdf->SetXY($x + 20,$y);
        $pdf->MultiCell(40,7, $resul[$i]['NombreArchivo'], 1);
        $pdf->SetXY($x +60,$y);
        $pdf->MultiCell(44,7, $resul[$i]['FechaSubida'], 1);
        $pdf->SetXY($x + 104,$y);
        $pdf->MultiCell(22,7, $resul[$i]['Size'].' Kb', 1);
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
        $pdf->MultiCell(120,7, utf8_decode('Reporte generado por: ').$Usuario, 0,1,0);
        $pdf->Output();
    

    }
}