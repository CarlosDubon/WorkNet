<?php
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');

class Notificaciones{
    public function verPanelNews(){
        $bd = new MySQL();
        $plantilla = new Plantilla();
        $sesion = new Sesion();
        
        $id = $sesion->obtenerVariableSesion('idUsuario');
        $query='SELECT new_count FROM cuenta WHERE idCuenta = '.$id;
        $resultado = $bd->consulta($query);
        
        $variables['news']=$resultado[0]['new_count'];
        
        $plantilla->verPagina('verNotificaciones', $variables);
    }
}