<?php
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');

class Trabajador {
    

    public function mostrarFormulario(){
        $plantilla = new Plantilla();
        $plantilla->verPagina('formularioTrabajador');
    }


 public function guardarTrabajador($datosTrabajador) {        
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $sesion = new Sesion();
        
        $tabla = 'cuenta';
        $columnas = 'Tipo,Usuario,Correo,Password,ImgCuenta,Empresa,Nombre,Apellido,FechaNac,DUI,Direc,Telefono,SitioWeb,Estado,cuenta_cuenta';
        
        $cuenta = $sesion->obtenerVariableSesion('idUsuario');
        $tipo='3';
        $usuario=$datosTrabajador['user'];
        $mail=$datosTrabajador['email'];
        $pass=$datosTrabajador['pass'];
        $repass=$datosTrabajador['repass'];
        $img = 'default.jpg';
        $empresa = $sesion->obtenerVariableSesion('nombreUsuario');        
        $name=$datosTrabajador['name'];
        $ape=$datosTrabajador['ape'];
        $birth=$datosTrabajador['birth'];        
        $dui=$datosTrabajador['dui'];
        $adres = 'no definida';
        $phone = '0000';
        $site = 'no definida';
        $estado='0';                

        $valores = '"'.$tipo . '","' . 
                    $usuario . '","' . 
                    $mail . '","' . 
                    $pass . '","' . 
                    $img . '","' . 
                    $empresa . '","' .                 
                    $name . '","' . 
                    $ape . '","' .                     
                    $birth . '","' . 
                    $dui . '","' . 
                    $adres . '","' . 
                    $phone . '","' . 
                    $site . '","' . 
                    $estado . '","'.
                    $cuenta. '"';
    if ($pass == $repass)
       if($this->validarNombreUnico($usuario))
        if($this->validarNombreUsuario($name))
                $if($this->validarNombreUsuario($ape))
                    $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
        else{
            $utilidades->mostrarMensaje('El usuario ya está registrado. Por favor intente con un usuario diferente.');
            $plantilla->verPagina('formularioTrabajador');
            return 0;
        }
         
        if (isset($resultado))
            $utilidades->mostrarMensaje('Felicidades, el usuario se registro exitosamente!');
        else
            $utilidades->mostrarMensaje('Lo sentimos!, ocurrio un problema, por favor vuelva a intentar.');                    
         
        $plantilla->verPagina('formularioTrabajador');
    }
     private function validarNombreUnico($nombreUsuario) {
        $db = new MySQL();
         
        $consulta = 'select idCuenta from cuenta where Usuario = "'. $nombreUsuario .'"';
        $resultado = $db->consulta($consulta);
        if(count($resultado) > 0)
            return false;
        else           
            return true;
         
    }
            private function validarNombreUsuario ($nombreUsuario){
                $permitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    for ($i = 0; $i<strlen($nombreUsuario); $i++){
                        if(strpos($permitidos, substr($nombreUsuario, $i, 1)))
                            return true;
                        else
                            return false;
            }
    }
}