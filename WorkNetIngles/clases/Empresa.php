<?php
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');


class Empresa {


    public function mostrarFormulario() {
        $plantilla = new Plantilla();
        $plantilla->verPaginaSinPlantilla('formularioEmpresa');
    }


    public function guardarEmpresa($datosEmpresa) {        
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $date=new DateTime();
        $dateNow = $date->format('Y-m-d');
        
        $tabla = 'cuenta';
        $columnas = 'Tipo,Usuario,Correo,Password,ImgCuenta,Empresa,Nombre,Apellido,FechaNac,DUI,Direc,Telefono,SitioWeb,Estado';

        $tipo = '2';
        $empresa = $datosEmpresa['empresa'];
        $user = $datosEmpresa['user'];
        $password = $datosEmpresa['password'];
        $repassword = $datosEmpresa['repassword'];
        $name = $datosEmpresa['name'];
        $ape = $datosEmpresa['ape'];
        $dui = $datosEmpresa['dui'];
        $birth = $datosEmpresa['birth'];
        $email = $datosEmpresa['email'];
        $remail = $datosEmpresa['remail'];
        $site = $datosEmpresa['site'];
        $adres = $datosEmpresa['adres'];
        $phone = $datosEmpresa['phone'];
        $estado = '1';
        $img = 'default.jpg';
        
        $valores = '"'.$tipo . '","' . $user . '","' . $email . '","' . $password . '","' . $img . '","' . $empresa . '","' . $name . '","' . $ape . '","' . $birth . '","' . $dui . '","' . $adres . '","' . $phone . '","' . $site . '","' . $estado.'"';

if($dateNow > $birth)
    if ($password == $repassword && $email == $remail)
        if($this->validarNombreUnico($user))
                if($this->validarNombreUsuario($name))
                    if($this->validarNombreUsuario($ape))
                        $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
        else{
            $utilidades->mostrarMensaje('The user already exists, please try with another user.');
            $plantilla->verPaginaSinPlantilla('formularioEmpresa');
            return 0;
        }
    
         
        if (isset($resultado)){
            $utilidades->mostrarMensaje('Congrats! Now you are a WorkNet User.');
            $plantilla->verPaginaSinPlantilla('index');
        }
        else{
            $utilidades->mostrarMensaje('Sorry! there was an error, please try again.');                    
         
        $plantilla->verPaginaSinPlantilla('formularioEmpresa');
        }
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
    public function VerEmpresas() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $idUsuario = $sesion->obtenerVariableSesion('idUsuario');

        $consulta = 'select idCuenta as id,Usuario,Nombre,Apellido,Empresa from cuenta '
                . ' where idCuenta not in( select idCuentaAmigo from Amigo where idCuenta =' . $idUsuario . ' ) AND Tipo = 2 AND idCuenta !='.$idUsuario.' ';
        $listaUsuarios = $mysql->consulta($consulta);
        $encabezado = array('ID', 'User', 'Name', 'Surname', 'Enterprise');

        $acciones = '<a href="./agregarAmigo.php?idCuenta={{id}}"><i class="fa fa-user-plus"></i></a>';
        $acciones .= '<a href="./verPerfilAmigo.php?idCuenta={{id}}"> &nbsp Profile</a>';



        $variables['listaUsuarios'] = $utilidades->convertirTabla($listaUsuarios, $encabezado, $acciones);


        $sesion->agregarVariableSesion('permisoAgregarAmigo', '1');
        $plantilla->verPagina('listaPersonas', $variables);
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
