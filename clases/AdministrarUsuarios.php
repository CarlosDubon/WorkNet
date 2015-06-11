<?php

require_once realpath(dirname(__FILE__) . '/./Sesion.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');


class AdministrarUsuarios {

    private $tipoUsuario;
    private $nombreUsuario;
    private $idUsuario;
    private $url;


    public function verificarUsuario($usuario, $password) {
        $db = new MySQL();
        $utilidades = new Utilidades();
        $query = "SELECT * FROM cuenta WHERE Usuario= '" . $usuario . "' and Password ='" . $password . "'";
        $resultado = $db->consulta($query);

        if (count($resultado) > 0) {
            for ($i = 0; $i < count($resultado); $i++) {
                $id = $resultado[$i]['idCuenta'];

                switch ($resultado[$i]['Tipo']) {
                    case 1:
                        $this->tipoUsuario = 1;
                        $this->url = 'vistas/homeAd.php';
                        break;
                    case 2:
                        $this->tipoUsuario = 2;
                        $url = 'vistas/homeE.php';
                        break;
                    case 3:
                        $this->tipoUsuario = 3;
                        $this->url = 'vistas/homeT.php';
                        break;
                    case 4:

                        $this->tipoUsuario = 4;
                        $this->url = 'vistas/homeP.php';
                        break;
                }
                $this->nombreUsuario = $resultado[$i]['Usuario'];
                $this->idUsuario = $resultado[$i]['idCuenta'];
            }
        } else {
            $utilidades->mostrarMensaje('Lo sentimos! El usuario o contraseña son incorrectos, Por favor intente de nuevo');
            $utilidades->redireccionar('index.php');
        }

        if (isset($respuesta)) {
            $plantilla = new Plantilla();            
            echo $plantilla->verPaginaSinPlantilla('index', $respuesta);
        } else {
            $sesion = new Sesion();
            $sesion->iniciarSesion($this->tipoUsuario, $this->nombreUsuario, $this->idUsuario);

                      
            $plantilla = new Plantilla();                        
            $plantilla->verPagina();
        }
    }

   
    public function verificarSesion($tipoUsuario = array()) {
        $sesion = new Sesion();
        $redireccionar = new Utilidades();
        $continuar = 0;
 
        if ($sesion->existeVariableSesion('tipoUsuario')) {            
            for ($i = 0; $i < count($tipoUsuario); $i++) {
                if($tipoUsuario[$i] == $sesion->obtenerVariableSesion('tipoUsuario')){
                    $continuar = 1;                    
                }                    
            }
        }
        if ($continuar == 0)
            $redireccionar->redireccionar('index.php');
    }


    public function logout() {
        $sesion = new Sesion();
        $utilidades = new Utilidades();
        $sesion->destruirSesion();
        //$utilidades->redireccionar('/controladores/index.php');
        $paginaInicio = new Plantilla();
        $paginaInicio->verPaginaSinPlantilla('index');
    }


    private function cargarMenu() {
        $db = new MySQL();
        $id = '';
        $salida = '';
        $query = "SELECT * FROM cuenta";

        $resultado = $db->consulta($query);

        for ($i = 0; $i < count($resultado); $i++)
            $id = $resultado[$i]['idCuenta'];

        $salida = "<div class='list-group col-xs-3'><a href='perfilempre.php?id=$id' class='list-group-item active'>Perfil<br></a>";
               
        return $salida;
    }

}
