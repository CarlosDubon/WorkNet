<?php

require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');
require_once realpath(dirname(__FILE__) . '/./Empresa.php');


class Perfil {
    var $rutaServidor='C:\\xampp\\htdocs\\WorkNet\\fotos\\';

    public function mostrarPerfil() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $empresa = new Empresa();

        $consulta = ' select c.ImgCuenta, c.SitioWeb,c.Empresa, c.idCuenta,c.FechaNac,c.Categoria, c.tipo, c.usuario, c.correo from cuenta c where c.idCuenta = ' . $sesion->obtenerVariableSesion('idUsuario');
        $resultado = $mysql->consulta($consulta);

        $query='SELECT NombreCat FROM categorias';
        $result= $mysql->consulta($query);
        $variables['categoria'] = $empresa->convertirHTMLCategorias($result);
        //print_r($resultado);
        $variables['Id'] = $resultado[0]['idCuenta'];
        $variables['Tipo'] = $resultado[0]['tipo'];
        $variables['Usuario'] = $resultado[0]['usuario'];
        $variables['Correo'] = $resultado[0]['correo'];
        $variables['Empresa'] = $resultado[0]['Empresa'];
        $variables['Web'] = $resultado[0]['SitioWeb'];
        $variables['Fun']=$resultado[0]['FechaNac'];
        $variables['Categoria']=$resultado[0]['Categoria'];
        $variables['photo'] = '../fotos/'.$resultado[0]['usuario'].'\\'.$resultado[0]['ImgCuenta'];


        $plantilla->verPagina('perfilEmpresa',$variables);
    }

        public function crearDirectorio($nombreDirectorio='prueba'){
        if(!is_dir($this->rutaServidor.$nombreDirectorio)){
            mkdir($this->rutaServidor.$nombreDirectorio, 0777);
        }
    }

     public function subirFoto($archivo){
                $bd = new MySQL();
                $sesion = new Sesion();
                $utilidades= new Utilidades();
                $plantilla = new Plantilla();
                $id = $sesion->obtenerVariableSesion('idUsuario');
                $carpeta=$sesion->obtenerVariableSesion('nombreUsuario');

                $foto = str_replace(' ','_',$archivo['file']['name']);

                $tabla = 'cuenta';
                $cambio =' ImgCuenta="'.$foto.'"';
                $where = ' idCuenta="'.$id.'"';

                $resultado = $bd->modificarRegistro($tabla, $cambio, $where);

                $utilidades-> mostrarMensaje('La foto se actualizo correctamente');

                if ($archivo['file']['error']>0){
                    $utilidades->mostrarMensaje('Lo sentimos!, Ocurrio un problema, por favor intente de nuevo.');
                    $plantilla->verPagina('perfil_Mostrar');
                }else{
                    $this->crearDirectorio($carpeta);
                    //echo $this->rutaServidor.$carpeta."\\";
                    move_uploaded_file(str_replace(' ',':_',$archivo['file']['tmp_name']),$this->rutaServidor.$carpeta."\\".$foto);

                    $utilidades->Redireccionar('controladores/perfil_Mostrar.php');
                }
            }
    public function verPerfilAmigo($id){
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();

        $consulta = ' select c.ImgCuenta,c.FechaNac, c.SitioWeb,c.Empresa, c.idCuenta, c.tipo,c.Categoria, c.usuario, c.correo from cuenta c where c.idCuenta = ' . $id;

        $resultado = $mysql->consulta($consulta);

        //print_r($resultado);
        $variables['Id'] = $resultado[0]['idCuenta'];
        $variables['Tipo'] = $resultado[0]['tipo'];
        $variables['Usuario'] = $resultado[0]['usuario'];
        $variables['Correo'] = $resultado[0]['correo'];
        $variables['Empresa'] = $resultado[0]['Empresa'];
        $variables['Web'] = $resultado[0]['SitioWeb'];
        $variables['Fun'] = $resultado[0]['FechaNac'];
        $variables['Categoria'] = $resultado[0]['Categoria'];

        $variables['photo'] = '../fotos/'.$resultado[0]['usuario'].'\\'.$resultado[0]['ImgCuenta'];


        $plantilla->verPagina('perfilEmpresaV',$variables);

    }
        public function mostrarPerfilUsuario() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();

        $consulta = ' select c.ImgCuenta, c.Nombre,c.Apellido, c.idCuenta, c.tipo, c.usuario, c.correo, c.apellido,c.dui from cuenta c where c.idCuenta = ' . $sesion->obtenerVariableSesion('idUsuario');

        $resultado = $mysql->consulta($consulta);

        //print_r($resultado);
        $variables['Id'] = $resultado[0]['idCuenta'];
        $variables['DUI'] = $resultado[0]['dui'];
        $variables['Usuario'] = $resultado[0]['usuario'];
        $variables['Nombre'] = $resultado[0]['Nombre'];
        $variables['Apellido'] = $resultado[0]['Apellido'];
        $variables['Correo'] = $resultado[0]['correo'];
        $variables['photo'] = '../fotos/'.$resultado[0]['usuario'].'\\'.$resultado[0]['ImgCuenta'];


        $plantilla->verPagina('perfilUsuario',$variables);
    }
         public function subirFotoUsuario($archivo){
                $bd = new MySQL();
                $sesion = new Sesion();
                $utilidades= new Utilidades();
                $plantilla = new Plantilla();
                $id = $sesion->obtenerVariableSesion('idUsuario');
                $carpeta=$sesion->obtenerVariableSesion('nombreUsuario');

                $foto = str_replace(' ','_',$archivo['file']['name']);

                $tabla = 'cuenta';
                $cambio =' ImgCuenta="'.$foto.'"';
                $where = ' idCuenta="'.$id.'"';

                $resultado = $bd->modificarRegistro($tabla, $cambio, $where);

                $utilidades-> mostrarMensaje('La foto se actualizo correctamente');

                if ($archivo['file']['error']>0){
                    $utilidades->mostrarMensaje('Lo sentimos!, Ocurrio un problema, por favor intente de nuevo.');
                    $plantilla->verPagina('perfil_Mostrar');
                }else{
                    $this->crearDirectorio($carpeta);
                    //echo $this->rutaServidor.$carpeta."\\";
                    move_uploaded_file(str_replace(' ',':_',$archivo['file']['tmp_name']),$this->rutaServidor.$carpeta."\\".$foto);

                    $utilidades->Redireccionar('controladores/verPerfilUsuario.php');
                }
            }
    public function verPerfilUsuarioAmigo($id){

      $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();

        $consulta = ' select c.ImgCuenta, c.Nombre,c.Apellido, c.idCuenta, c.tipo, c.usuario, c.correo, c.apellido,c.dui from cuenta c where c.idCuenta = ' . $id;

        $resultado = $mysql->consulta($consulta);

        //print_r($resultado);
         $variables['Id'] = $resultado[0]['idCuenta'];
        $variables['DUI'] = $resultado[0]['dui'];
        $variables['Usuario'] = $resultado[0]['usuario'];
        $variables['Nombre'] = $resultado[0]['Nombre'];
        $variables['Apellido'] = $resultado[0]['Apellido'];
        $variables['Correo'] = $resultado[0]['correo'];
        $variables['photo'] = '../fotos/'.$resultado[0]['usuario'].'\\'.$resultado[0]['ImgCuenta'];

        $plantilla->verPagina('perfilUsuarioV',$variables);
    }
    public function mostrarPerfilTrabajador() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();

        $consulta = ' select c.ImgCuenta,c.Empresa,c.FechaNac, c.Nombre,c.Apellido, c.idCuenta, c.tipo, c.usuario, c.correo, c.apellido,c.dui from cuenta c where c.idCuenta = ' . $sesion->obtenerVariableSesion('idUsuario');

        $resultado = $mysql->consulta($consulta);

        //print_r($resultado);
        $variables['Id'] = $resultado[0]['idCuenta'];
        $variables['DUI'] = $resultado[0]['dui'];
        $variables['Usuario'] = $resultado[0]['usuario'];
        $variables['Nombre'] = $resultado[0]['Nombre'];
        $variables['Empresa'] = $resultado[0]['Empresa'];
        $variables['Nac'] = $resultado[0]['FechaNac'];
        $variables['Apellido'] = $resultado[0]['Apellido'];
        $variables['Correo'] = $resultado[0]['correo'];
        $variables['photo'] = '../fotos/'.$resultado[0]['usuario'].'\\'.$resultado[0]['ImgCuenta'];


        $plantilla->verPagina('perfilTrabajador',$variables);
    }
         public function subirFotoTrabajador($archivo){
                $bd = new MySQL();
                $sesion = new Sesion();
                $utilidades= new Utilidades();
                $plantilla = new Plantilla();
                $id = $sesion->obtenerVariableSesion('idUsuario');
                $carpeta=$sesion->obtenerVariableSesion('nombreUsuario');

                $foto = str_replace(' ','_',$archivo['file']['name']);

                $tabla = 'cuenta';
                $cambio =' ImgCuenta="'.$foto.'"';
                $where = ' idCuenta="'.$id.'"';

                $resultado = $bd->modificarRegistro($tabla, $cambio, $where);

                $utilidades-> mostrarMensaje('La foto se actualizo correctamente');

                if ($archivo['file']['error']>0){
                    $utilidades->mostrarMensaje('Lo sentimos!, Ocurrio un problema, por favor intente de nuevo.');
                    $plantilla->verPagina('perfilTrabajador');
                }else{
                    $this->crearDirectorio($carpeta);
                    //echo $this->rutaServidor.$carpeta."\\";
                    move_uploaded_file(str_replace(' ',':_',$archivo['file']['tmp_name']),$this->rutaServidor.$carpeta."\\".$foto);

                    $utilidades->Redireccionar('controladores/verPerfilTrabajador.php');
                }
            }

    public function editarCorreo($editor){
        $db = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $id = $sesion->ObtenerVariableSesion('idUsuario');
        $newEmail = $editor['newEmail'];

        $tabla = 'cuenta';
        $cambio = 'Correo ="'.$newEmail.'"';
        $where = 'idCuenta='.$id;

        $resultado = $db->modificarRegistro($tabla,$cambio,$where);

        if($resultado)
            $utilidades-> mostrarMensaje('El correo se ha actualizado correctamente');
        $utilidades -> Redireccionar('controladores/perfil_Mostrar.php');
    }

    public function editarWeb($editor){
        $db = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $id = $sesion->ObtenerVariableSesion('idUsuario');
        $newWeb = $editor['newWeb'];

        $tabla = 'cuenta';
        $cambio = 'SitioWeb="'.$newWeb.'"';
        $where = 'idCuenta='.$id;
        $resultado = $db->modificarRegistro($tabla,$cambio,$where);

        if($resultado)
            $utilidades-> mostrarMensaje('El correo se ha actualizado correctamente');
        $utilidades -> Redireccionar('controladores/perfil_Mostrar.php');
    }
        public function editarCorreoUsuario($editor){
        $db = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $id = $sesion->ObtenerVariableSesion('idUsuario');
        $newEmail = $editor['newEmail'];

        $tabla = 'cuenta';
        $cambio = 'Correo ="'.$newEmail.'"';
        $where = 'idCuenta='.$id;

        $resultado = $db->modificarRegistro($tabla,$cambio,$where);

        if($resultado)
            $utilidades-> mostrarMensaje('El correo se ha actualizado correctamente');
        $utilidades -> Redireccionar('controladores/verPerfilUsuario.php');
    }

    public function editarCategoria($editor){
        $bd = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $id= $sesion->obtenerVariableSesion('idUsuario');
        $newCat = $editor['categoria'];

        $tabla ='cuenta';
        $cambio = 'Categoria="'.$newCat.'"';
        $where = 'idCuenta='.$id;

        $resultado = $bd->modificarRegistro($tabla,$cambio,$where);
        if($resultado)
            $utilidades->mostrarMensaje('Usted se ha cambiado de categoria correctamente');
        else
            $utilidades->mostrarMensaje('Lo sentimos, ocurrio un proble por favor vuelva a intentar');
        $utilidades -> Redireccionar('controladores/perfil_Mostrar.php');

    }
}
