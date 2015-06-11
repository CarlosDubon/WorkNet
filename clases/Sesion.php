<?php

class Sesion {
    
    function __construct() {
        @session_start();
    }
    

    public function iniciarSesion($tipoUsuario, $nombreUsuario, $idUsuario) {        
        $_SESSION['tipoUsuario'] = $tipoUsuario;
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        $_SESSION['idUsuario'] = $idUsuario;
    }


    public function agregarVariableSesion($nombreVariable, $variable) {        
        $_SESSION[$nombreVariable] = $variable;
    }



    public function obtenerVariableSesion($nombreVariable) {
        return $_SESSION[$nombreVariable];
    }



    public function eliminarVariableSesion($nombreVariable) {
        $_SESSION[$nombreVariable] = '';
        unset($_SESSION[$nombreVariable]);
    }



    public function destruirSesion() {
        $_SESSION = array();
        session_destroy();
    }


    public function existeVariableSesion($variable) {                
        if (isset($_SESSION[$variable]))
            return true;
        else
            return false;
    }

    public function mostrarSesion(){
        $sesion= 'VARIABLES EN LA SESION DEL NAVEGADOR \n';        
        foreach ($_SESSION as $elemento => $valor)
            $sesion .= $elemento.' : '. $valor.'\n';            
        echo "<script type='text/javascript'> alert('".$sesion."'); </script>";
    }
}