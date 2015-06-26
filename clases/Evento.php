<?php

require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');


class Evento {


    public function mostrarFormulario() {
        $plantilla = new Plantilla();
        $plantilla->verPagina('formularioEventos');
    }
     public function guardarEvento($datosEvento) {        
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $dateNow = new DateTime();
        $date = $dateNow->format('Y-m-d');
        $Sesion = new Sesion();
        
        
        $tabla = 'eventos';
        $columnas = 'idCuenta,FechaIni,FechaFin,Nombre,Descripcion';

        $FechaIni=$datosEvento['empieza'];
        $FechaFin=$datosEvento['termina'];
        $Nombre=$datosEvento['nombre'];
        $Descripcion=$datosEvento['descripcion'];
        $idCuenta=$Sesion->obtenerVariableSesion('idUsuario');
        
        $valores = '"'.$idCuenta. '","' . 
                    $FechaIni. '","' . 
                    $FechaFin. '","' . 
                    $Nombre . '","'.
                    $Descripcion.'"';
    
    if ($date <= $FechaIni){
        if($FechaIni <= $FechaFin){
            $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
        }else{
            $utilidades->mostrarMensaje('Lo sentimos, el evento no puede terminar antes que incie ');
        }
            }else{
                    $utilidades->mostrarMensaje('Lo sentimos!, por favor verifique las fechas');
            }
         
        if (isset($resultado))
            $utilidades->mostrarMensaje('El evento se creo correctamente!');
        else
            $utilidades->mostrarMensaje('Lo sentimos!,Oucrrio un problema, por favor intentelo de nuevo!0');                    
        
        $utilidades->Redireccionar('controladores/formEventos.php');
     }
}
