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
            $utilidades->mostrarMensaje('Sorry! The event can not start before the end date.');
        }
            }else{
                    $utilidades->mostrarMensaje('Sorry! Please verify the dates.');
            }
         
        if (isset($resultado))
            $utilidades->mostrarMensaje('The event was successfully created.');
        else
            $utilidades->mostrarMensaje('Sorry! There was an error. Please try again.');                    
        
        $utilidades->Redireccionar('controladores/formEventos.php');
     }
    
        public function mostrarFormularioTrabaja() {
        $plantilla = new Plantilla();
        $plantilla->verPagina('formularioEventoTraba');
    }
    
    public function guardarEventoTrabajador($datosEvento) {        
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
            $utilidades->mostrarMensaje('Sorry! The event can not start before the end date.');
        }
            }else{
                    $utilidades->mostrarMensaje('Sorry! Please verify the dates.');
            }
         
        if (isset($resultado)){
            $utilidades->mostrarMensaje('The event was successfully created.');
             
            $consulta1= 'SELECT cuenta_cuenta FROM cuenta WHERE idCuenta ='.$idCuenta;
            $producto = $bd->consulta($consulta1);
            $id=$producto[0]['cuenta_cuenta'];
                $new = 'SELECT new_count FROM cuenta WHERE idCuenta ='.$id;
                            $count = $bd->consulta($new);

                            $contador = $count[0]['new_count'];
                            $tabla2 = 'cuenta';
                            $cambio2 = 'new_count='.$contador.'+'.'1';
                            $where2 = 'idCuenta='.$id;

                            $sumar = $bd ->modificarRegistro($tabla2,$cambio2,$where2);

                            $tabla3 = 'solicitudes';
                            $columnas3 ='Tipo,cuentaAmigo,cuenta_idCuenta,user_idCuenta';
                            $tipo = 2;
                            $idCuenta_cuenta = $Sesion->obtenerVariableSesion('idUsuario');
                            $user_idCuenta=$Sesion->obtenerVariableSesion('nombreUsuario');
                            $valores3 = '"' .$tipo. '","' 
                                         .$id.'","'
                                         .$idCuenta_cuenta.'","'
                                         .$user_idCuenta.'"';
                            $consuLta= $bd ->insertarRegistro($tabla3,$columnas3,$valores3);
        }
        else
            $utilidades->mostrarMensaje('Sorry! There was an error. Please try again.');                    
        
        $utilidades->Redireccionar('controladores/formEventos.php');
     }
}
