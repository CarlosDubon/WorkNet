<?php

require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');


class Publicaciones {
 

    public function guardarPub($datosPub) {        
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $sesion = new Sesion();
        
        $tabla = 'publicaciones';
        $columnas = 'Texto,imgPub,Fecha,cuenta_idCuenta,Usuario_cuenta';

        $FechaPub= date("Y").'-'.date("m").'-'.date("d") ;
        $Texto=$datosPub['texto'];
        $usuario = $sesion->obtenerVariableSesion('nombreUsuario');
        $id = $sesion->obtenerVariableSesion('idUsuario');        
        $img = "";

        $valores = '"'.$Texto.'","'
                    .$img.'","'
                    .$FechaPub.'","'
                    .$id.'","'
                    .$usuario.'"';
        
        $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);        
        if (!$resultado)            
            $utilidades->mostrarMensaje('Sorry!, something is wrong please try again.');                            
    }
    
     public function mostrarPub() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
         
         $idUsuario = $sesion->obtenerVariableSesion('idUsuario');
         $query = 'SELECT p.idPub as id,p.Texto,p.ImgPub,p.Fecha,p.Usuario_cuenta,p.works FROM publicaciones p ORDER BY idPub DESC';
        
        $resultado = $mysql->consulta($query);

        //print_r($resultado);
        $variables['publicaciones'] = $this->convertirPubHTML($resultado);
        
        $plantilla->verPagina('contenido-empre',$variables);
    }
    
    public function convertirPubHTML($Pub = array()){
        $db = new MySQL();
        $sesion = new Sesion();
        $id = $sesion->obtenerVariableSesion('idUsuario');

        $query = "SELECT imgCuenta FROM cuenta WHERE idCuenta=$id";
        $result = $db->consulta($query);
        
        $photo = $result[0]['imgCuenta'];
        
        $pub = '';        

        for ($i = 0; $i < count($Pub); $i++) {
            $pub.=  '<blockquote class="public"><input type="hidden" value="'.$Pub[$i]['id'].'" name="idPub">
                       <a href="#"><small class="col-xs-3">'.$Pub[$i]['Usuario_cuenta'].'</cite></small></a>                        <small class="fechapub">'.$Pub[$i]['Fecha'].'</small>
                       <br><img src="../fotos/'.$sesion->obtenerVariableSesion('nombreUsuario').'/'.$photo.'" class="img-circle" id="img-pub">
                        <p><b>'.$Pub[$i]['Texto'].'</b></p>
                        <a href="../controladores/works.php?idPub='.$Pub[$i]['id'].'" class="btn btn-default boton" id="btn btn"><i class="fa fa-suitcase"></i> Work</a >
                        <a href="./mostrarPubCom.php?idPub='.$Pub[$i]['id'].'" class="btn btn-default boton" ><span class="fui-chat"></span></i> Comentar </a>
                        <button type="button" class="btn btn-default boton" id=""><span class="fui-cross"></span></i>Denuncia </button><span class="badge" id="de">Esta publicion tiene ' .$Pub[$i]['works'].' work(s)</span>
                    </blockquote>';      
                }
        return $pub;

    }
    
    public function work($id){
        $db = new MySQL();
        $utilidades = new Utilidades();
        
        $query = 'SELECT works FROM publicaciones WHERE idPub='.$id;
        $result = $db->consulta($query);
        $works = $result[0]['works'];
        
        $tabla = 'publicaciones';
        $cambio = 'works ='.$result[0]['works'].'+'. '1';
        $where = 'idPub='.$id;
        
        $resultado = $db->modificarRegistro($tabla,$cambio,$where);
        $utilidades->Redireccionar("controladores/publicar.php");
        
        
    }

}
