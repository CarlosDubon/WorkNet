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
        $columnas = 'idCuenta,FechaIni,HoraIni,FechaFin,HoraFin,Nombre,Descripcion';

        $FechaIni=$datosEvento['empieza'];
        $HoraInicio=$datosEvento['HInicio'];
        $FechaFin=$datosEvento['termina'];
        $HoraFin=$datosEvento['HTermina'];
        $Nombre=$datosEvento['nombre'];
        $Descripcion=$datosEvento['descripcion'];
        $idCuenta=$Sesion->obtenerVariableSesion('idUsuario');

        $valores = '"'.$idCuenta. '","' .
                    $FechaIni. '","' .
                    $HoraInicio.'","'.
                    $FechaFin. '","' .
                    $HoraFin.'","'.
                    $Nombre . '","'.
                    $Descripcion.'"';

    if ($date <= $FechaIni){
        if($FechaIni <= $FechaFin){
            $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
        }else{
            $utilidades->mostrarMensaje('¡Lo sentimos! El evento no puede empezar antes de que finalice');
        }
            }else{
                    $utilidades->mostrarMensaje('¡Lo sentimos! Por favor verifique las fechas y horas ingresadas.');
            }

        if (isset($resultado))
            $utilidades->mostrarMensaje('El evento se creó correctamente.');
        else
            $utilidades->mostrarMensaje('¡Lo sentimos! Ocurrió un problema, por favor intente de nuevo.');

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
            $utilidades->mostrarMensaje('¡Lo sentimos! El evento no puede empezar antes de que finalice');
        }
            }else{
                    $utilidades->mostrarMensaje('¡Lo sentimos! Por favor verifique las fechas y horas ingresadas.');
            }

        if (isset($resultado)){
            $utilidades->mostrarMensaje('El evento se creó correctamente.');

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
            $utilidades->mostrarMensaje('¡Lo sentimos! Ocurrió un problema, por favor intente de nuevo.');

        $utilidades->Redireccionar('controladores/formEventos.php');
     }
    
    public function mostrarListaEventos(){
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $sesion = new Sesion();
        
        $id = $sesion->obtenerVariableSesion('idUsuario');
        $query =  'SELECT idEventos as id,FechaIni,HoraIni,FechaFin,HoraFin,Nombre,Descripcion FROM eventos WHERE idCuenta ='.$id;
        $resultado = $bd->consulta($query);
        
        $encabezado = array('ID','Fecha de Incio','Hora de Inicio','Fecha Final','Hora Final','Titulo','Descripcion');
        $acciones = '<center><a href="./eliminarEvento.php?idEventos={{id}}" class="btn btn-danger" title="Eliminar Evento" id="acciones"><i class="fa fa-trash"></i></a>';
        $variables['listaEventos'] = $utilidades->convertirTabla($resultado,$encabezado,$acciones);
        
        $plantilla->verPagina('listaEventos', $variables);
    }
    
    public function eliminarEvento($id){
        $bd = new MySQL();
        $utilidades = new Utilidades();
        
        $tabla ='eventos';
        $where = 'idEventos='.$id;
        
        $resultado = $bd->eliminarRegistro($tabla,$where);
        $utilidades->Redireccionar('controladores/verEventosLista.php');
        $utilidades->mostrarMensaje('El evento se elimino correctamente');
    }
}
