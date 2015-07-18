<?php
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');


class Empresa {


    public function mostrarFormulario() {
        $plantilla = new Plantilla();
        $bd = new MySQL();
        $query = 'SELECT NombreCat FROM categorias WHERE cuenta_idCuenta=1';
        $resultado = $bd->consulta($query);
        $variables['opciones']=$this->convertirHTMLCategorias($resultado);
        
        $plantilla->verPaginaSinPlantilla('formularioEmpresa',$variables);
    }
    
    public function convertirHTMLCategorias($Cat = array()){
        
        $cat = '';
        for($i=0; $i<count($Cat) ;$i++){
            $cat .='<option value="'.$Cat[$i]['NombreCat'].'">'.$Cat[$i]['NombreCat'].'</option>';
        }
        return $cat;
    }


    public function guardarEmpresa($datosEmpresa) {        
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $date=new DateTime();
        $dateNow = $date->format('Y-m-d');
        
        $tabla = 'cuenta';
        $columnas = 'Tipo,Usuario,Correo,Password,ImgCuenta,Empresa,Nombre,Apellido,FechaNac,DUI,Direc,Telefono,SitioWeb,Estado,Categoria';

        $tipo = '2';
        $empresa = $datosEmpresa['empresa'];
        $user = str_replace(' ','',$datosEmpresa['user']);
        $password = $datosEmpresa['password'];
        $repassword = $datosEmpresa['repassword'];
        $name = $datosEmpresa['name'];
        $ape = $datosEmpresa['ape'];
        $dui = $datosEmpresa['dui'];
        $birth = $datosEmpresa['birth'];
        $email = trim($datosEmpresa['email']);
        $site = $datosEmpresa['site'];
        $adres = $datosEmpresa['adres'];
        $phone = $datosEmpresa['phone'];
        $categoria = $datosEmpresa['categoria'];
        $estado = '1';
        $img = 'default.jpg';
        
        $valores = '"'.$tipo . '","' . $user . '","' . $email . '","' . $password . '","' . $img . '","' . $empresa . '","' . $name . '","' . $ape . '","' . $birth . '","' . $dui . '","' . $adres . '","' . $phone . '","' . $site . '","' . $estado.'","'.$categoria.'"';

if($dateNow > $birth)
    if ($password == $repassword)
        if($this->validarNombreUnico($user))
            $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
        else{
            $utilidades->mostrarMensaje('El usuario ya existe, por favor intente de nuevo');
            $utilidades->Redireccionar('controladores/formNuevaEmpresa.php');
            return 0;
        }
    
      
        if ($resultado){
            $utilidades->mostrarMensaje('¡Felicidades! Usted es parte de WorkNet ahora');
            $utilidades->Redireccionar('controladores/index.php');
        }
        else{
            $utilidades->mostrarMensaje('Lo sentimos!, Ocurrio un error, por favor intente de nuevo');                    
         $utilidades->Redireccionar('controladores/formNuevaEmpresa.php');
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
                . ' where idCuenta not in( select idCuentaAmigo from Amigo where idCuenta =' . $idUsuario . ' ) AND Tipo = 2 AND idCuenta  !='.$idUsuario.' ';
        $listaUsuarios = $mysql->consulta($consulta);
        $encabezado = array('ID', 'Usuario', 'Nombre', 'Apellido', 'Empresa');

        $acciones = '<a href="./agregarAmigo.php?idCuenta={{id}}"><i class="fa fa-user-plus"></i></a>';
        $acciones .= '<a href="./verPerfilAmigo.php?idCuenta={{id}}"> &nbsp Perfil</a>';



        $variables['listaUsuarios'] = $utilidades->convertirTabla($listaUsuarios, $encabezado, $acciones);


        $sesion->agregarVariableSesion('permisoAgregarAmigo', '1');
        $plantilla->verPagina('listaPersonas', $variables);
    }
    
}
