<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');

class Usuario {
    

    public function mostrarFormulario(){
        $plantilla = new Plantilla();
        $plantilla->verPaginaSinPlantilla('formularioNuevoUsuario');
    }
    

    public function guardarUsuario($datosUsuario) {        
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        
        $tabla = 'cuenta';
        $columnas = 'Tipo,Usuario,Correo,Password,ImgCuenta,Empresa,Nombre,Apellido,FechaNac,DUI,Direc,Telefono,SitioWeb,Estado';

        $tipo='4';
        $usuario=$datosUsuario['usuario'];
        $mail=$datosUsuario['mail'];
        $remail=$datosUsuario['remail'];
        $pass=$datosUsuario['pass'];
        $repass=$datosUsuario['repass'];
        $img = 'default.jpg';
        $empresa = 'no definida';        
        $name=$datosUsuario['name'];
        $ape=$datosUsuario['ape'];
        $birth=$datosUsuario['birth'];        
        $dui=$datosUsuario['dui'];
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
                    $estado . '"';

        
    if ($pass == $repass && $mail == $remail)
        if($this->validarNombreUnico($usuario))
            $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
        else{
            $utilidades->mostrarMensaje('El usuario ya está registrado. Por favor intente con un usuario diferente.');
            $plantilla->verPaginaSinPlantilla('formularioNuevoUsuario');
            return 0;
        }
         
        if ($resultado){
            $utilidades->mostrarMensaje('¡Felicitaciones! Ya eres parte de WorkNet.');
            $plantilla->verPaginaSinPlantilla('index');
        }
        else{
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');                    
         
            $utilidades->Redireccionar('controladores/index.php');
        }
    }
    
    
    public function mostrarUsuarioTrabajador(){
        $pantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();
        $cuenta = $sesion->obtenerVariableSesion('idUsuario');
        $query = "SELECT idCuenta as id, Usuario, Nombre, Apellido FROM cuenta where Tipo = '3' AND cuenta_cuenta=$cuenta";
        $listaUsuarios = $mysql->consulta($query);
        $encabezado = array('ID', 'Usuario', 'Nombre','Apellido');
        $acciones = '<center><a data-toggle="modal" data-target="#deleteUser" class="btn btn-danger"><span class="fui-trash"></span></a>';
        $acciones .= ' <a data-toggle="modal" data-target="#recoverPass " class = "btn btn-info" ><span class="fui-new"></span></a><br><br>';
        
        if(count($listaUsuarios) >= 1 ){
            $variables['listaUsuarios'] = $utilidades->convertirTabla($listaUsuarios, $encabezado, $acciones);
            $sesion->agregarVariableSesion('permisoAccionesUsuario','1');
        }else{
            $variables['listaUsuarios'] ='';
        }
        
        $pantilla->verPagina('listaUsuarios', $variables);        
    }
    
    public function mostrarListaUsuarios(){
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();
        

        $consulta = 'select idCuenta as id,Usuario,Nombre,Apellido,if(Estado = 1,"Active","Inactive") as Estado from cuenta where Tipo!=1';
        $listaUsuarios = $mysql->consulta($consulta);
        $encabezado = array('ID', 'Usuario', 'Nombre', 'Apellido', 'Estado');
        
        $acciones = '<center><a data-toggle="modal" data-target="#activarUser" class="btn btn-success" id="acciones"><span class="fui-check"></span></a>';
        $acciones .= ' <a  data-toggle="modal" data-target="#descativarUser" class = "btn btn-danger" id="acciones"><span class="fui-cross"></span></a>';
        $acciones .= ' <a  data-toggle="modal" data-target="#recoverPass" class = "btn btn-info" id="acciones" ><span class="fui-new"></span></a>';
        $acciones .= ' <a  data-toggle="modal" data-target="#deleteUser" class="btn btn-danger" id="acciones"><span class="fui-trash"></span></a></center>';
        

      
        $variables['listaUsuarios'] = $utilidades->convertirTabla($listaUsuarios, $encabezado, $acciones);
        $variables['id'] = $listaUsuarios[0]['id'];
        /*
         * Mostramos la pagina en el navegador         
         * 
         * creamos una variable en sesion para controlar que la accion se ejecute una sola vez
         */
        $sesion->agregarVariableSesion('permisoAccionesUsuario', '1');
        $plantilla->verPagina('listaUsuarios', $variables);
    }
    
    public function activarUsuario($id){
        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();        
        
        $tabla = 'cuenta';
        $cambio = 'Estado = 1';
        $where = ' idCuenta='.$id;

        $resultado = $mysql->modificarRegistro($tabla, $cambio, $where);
        
        if ($resultado)
            $utilidades->mostrarMensaje('¡El usuario ahora es activo!');
        else
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');
        
        $utilidades->Redireccionar('controladores/usuarios_admin.php');
    }
    
    public function desactivarUsuario($id){
        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();        
        
        $tabla = 'cuenta';
        $cambio = 'Estado = 0';
        $where = ' idCuenta='.$id;

        $resultado = $mysql->modificarRegistro($tabla, $cambio, $where);
        
        if ($resultado)
            $utilidades->mostrarMensaje('¡El usuario ahora es inactivo!');
        else
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');
        
        $utilidades->Redireccionar('controladores/usuarios_admin.php');
    }
    
    public function recuperarClave($id){
        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();        
        
        $tabla = 'cuenta';
        $cambio = 'Password = "WorkNet2015"';
        $where = ' idCuenta='.$id;

        $resultado = $mysql->modificarRegistro($tabla, $cambio, $where);
        
        if ($resultado)
            $utilidades->mostrarMensaje('La contraseña se recuperó a WorkNet2015');
        else
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');
        
        $utilidades->Redireccionar('controladores/usuarios_admin.php');
    }
    

    
    public function eliminarUsuario($id){
        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();        
        
        $tabla = 'cuenta';        
        $where = ' idCuenta='.$id;

        $resultado = $mysql->eliminarRegistro($tabla, $where);
        
        if ($resultado)
            $utilidades->mostrarMensaje('¡El usuario se eliminó satisfactoriamente!');
        else
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');
        
        $utilidades->Redireccionar('controladores/usuarios_admin.php');
    }


        public function mostrarFormularioCambiarCont(){
        $plantilla = new Plantilla();
        $plantilla->verPagina('formularioCambiarContra-Admin');
    }
        public function CambiarContraAdmin($datosContraAdmin){
        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();
        
        $newpass = $datosContraAdmin['newpass'];
        $tabla = 'cuenta';
        $cambio = 'Password ="'.$newpass.'"';
        $where = 'idCuenta = 1';
        
        $resultado = $mysql->modificarRegistro($tabla, $cambio, $where);
        
        if ($resultado)
            $utilidades->mostrarMensaje('¡La contraseña se cambió satisfactoriamente!');
        else
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');
        
        $plantilla->verPagina();  
    }
    
    public function mostrarFormularioCambiarContEmpre(){
        $plantilla = new Plantilla();
        $plantilla->verPagina('formularioCambiarContra-Empre');
    }
        public function CambiarContraEmpre($datosContraEmpre){
        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();
        
        $id = $sesion->obtenerVariableSesion('idUsuario');
        $newpass = $datosContraEmpre['newpass'];
        $tabla = 'cuenta';
        $cambio = 'Password ="'.$newpass.'"';
        $where = 'idCuenta ="'.$id.'"';
            
        $resultado = $mysql->modificarRegistro($tabla, $cambio, $where);
        
        if ($resultado)
            $utilidades->mostrarMensaje('¡La contraseña se cambió satisfactoriamente!');
        else
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');
        
        $plantilla->verPagina();  
    }
      public function mostrarFormularioCambiarContTrabajador(){
        $plantilla = new Plantilla();
        $plantilla->verPagina('formularioCambiarContra-Trabajador');
    }
        public function CambiarContraTrabajador($datosContraTrabajador){
        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();
        
        $id = $sesion->obtenerVariableSesion('idUsuario');
        $newpass = $datosContraTrabajador['newpass'];
        $tabla = 'cuenta';
        $cambio = 'Password ="'.$newpass.'"';
        $where = 'idCuenta ="'.$id.'"';
        
        $resultado = $mysql->modificarRegistro($tabla, $cambio, $where);
        
        if ($resultado)
            $utilidades->mostrarMensaje('¡La contraseña se cambió satisfactoriamente!');
        else
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');
        
        $plantilla->verPagina();  
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

 public function mostrarFormularioCambiarContUsuario(){
        $plantilla = new Plantilla();
        $plantilla->verPagina('formularioCambiarContra-Usuario');
    }
        public function CambiarContraUsuario($datosContraUsuario){
        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();
        
        $id = $sesion->obtenerVariableSesion('idUsuario');
        $newpass = $datosContraTrabajador['newpass'];
        $tabla = 'cuenta';
        $cambio = 'Password ="'.$newpass.'"';
        $where = 'idCuenta ="'.$id.'"';
        
        $resultado = $mysql->modificarRegistro($tabla, $cambio, $where);
        
        if ($resultado)
            $utilidades->mostrarMensaje('¡La contraseña se cambió satisfactoriamente!');
        else
            $utilidades->mostrarMensaje('Lo sentimos, algo ha salido mal. Por favor intenta de nuevo.');
        
        $plantilla->verPagina();  
    }
     public function VerUsuarios() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $idUsuario = $sesion->obtenerVariableSesion('idUsuario');

        $consulta = 'select idCuenta as id,Usuario,Nombre,Apellido,Correo from cuenta '
                . ' where idCuenta not in( select idCuentaAmigo from Amigo where idCuenta =' . $idUsuario . ' ) AND Tipo = 4 AND idCuenta !='.$idUsuario.'';
        $listaUsuarios = $mysql->consulta($consulta);
        $encabezado = array('ID', 'Usuario', 'Nombre', 'Apellido', 'E-mail');

        $acciones = '<a href="./agregarAmigo.php?idCuenta={{id}}"><i class="fa fa-user-plus"></i></a>';
        $acciones .= '<a href="./verPerfilUsuarioAmigo.php?idCuenta={{id}}"> &nbsp Perfil</a>';



        $variables['listaUsuarios'] = $utilidades->convertirTabla($listaUsuarios, $encabezado, $acciones);


        $sesion->agregarVariableSesion('permisoAgregarAmigo', '1');
        $plantilla->verPagina('listaPersonas', $variables);
    }

}
