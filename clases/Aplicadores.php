<?php
    require_once realpath(dirname(__FILE__) . '/./MySQL.php');
    require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
    require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
    require_once realpath(dirname(__FILE__) . '/./Sesion.php');


    class Aplicadores {
        public function guardarAplicacion($a){
            $db = new MySQL();
            $sesion = new Sesion();
            $utilidades = new Utilidades();
            
            $tabla = 'aplicadores';
            $columnas ='idOferta,idEmpresa,Usuario,idUsuario';
            $idOferta = $a['idOferta'];
            $idEmpresa = $a['idEmpresa'];
            $Usuario = $sesion->obtenerVariableSesion('nombreUsuario');
            $idUsuario = $sesion->obtenerVariableSesion('idUsuario');
            
            $valores = '"'.$idOferta.'","'
                          .$idEmpresa.'","'
                          .$Usuario.'","'
                          .$idUsuario.'"';
            $resultado = $db->insertarRegistro($tabla,$columnas,$valores);
            
            if($resultado)
                $utilidades->mostrarMensaje('Su solicitud se envio correctamente');
            else
                $utilidades->mostrarMensaje('Lo sentimos!, Ocurrio un problema, Por favor intente de nuevo');
            $utilidades->Redireccionar('controladores/verOfertasUsuario.php');
    }
        
    public function mostrarInteresados($idOfertas){
        $db = new MySQL();
        $plantilla = new Plantilla();
        $sesion = new Sesion();
        $utilidades = new Utilidades();
        
        $idEmpresa = $sesion->obtenerVariableSesion('idUsuario');
        $query = 'SELECT idAplicacion, idUsuario as id,Usuario FROM aplicadores WHERE idOferta = '.$idOfertas.' AND idEmpresa ='.$idEmpresa;
        $resultado = $db->consulta($query);
        
        $encabezado = array('ID aplicador','idUsuario','Usuario');
        $acciones = '<a href="verPerfilUsuarioAmigo.php?idCuenta={{id}}"><i class="fa fa-eye"></i> Ver Perfil</a>';
        
        $variables['listaInteresados']=$utilidades->convertirTabla($resultado,$encabezado,$acciones);
        $plantilla -> verPagina('listaInteresados',$variables);
    }
}