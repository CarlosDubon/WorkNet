<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');


class Valoracion {
    
    public function votarUnaEstrella($id){
        $db = new MySQL();
        $utilidades = new Utilidades();
        $sesion = new Sesion();
        
        $idcuenta = $sesion-> obtenerVariableSesion('idUsuario');
        $valoracion = '1';
        $tabla = 'valoraciones';
        $columnas = 'idCuenta_cuenta,Valoracion,idPortafolio_porta';
        $valores = '"'.$idcuenta.'","'
                    .$valoracion.'","'
                    .$id.'"';
        $resultado = $db->insertarRegistro($tabla,$columnas,$valores);
        $utilidades -> Redireccionar('controladores/crearPortafolio.php');
    }


}