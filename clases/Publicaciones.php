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
        $columnas = 'Texto,imgUsuario,Fecha,cuenta_idCuenta,Usuario_cuenta';

        $FechaPub= date("Y").'-'.date("m").'-'.date("d") ;
        $Texto=$datosPub['texto'];
        $usuario = $sesion->obtenerVariableSesion('nombreUsuario');
        $id = $sesion->obtenerVariableSesion('idUsuario');        
        
        $query2 = 'SELECT imgCuenta FROM cuenta WHERE idCuenta ='.$id;
        $result = $bd->consulta($query2);
        $img = $result[0]['imgCuenta'];

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
         $query = 'SELECT p.idPub as id,p.Texto,p.ImgUsuario,p.Fecha,p.cuenta_idCuenta,p.Usuario_cuenta,p.works FROM publicaciones p ORDER BY idPub DESC';
        
        $resultado = $mysql->consulta($query);

        //print_r($resultado);
        $variables['publicaciones'] = $this->convertirPubHTML($resultado);
        
        $plantilla->verPagina('contenido-empre',$variables);
    }
    
    public function convertirPubHTML($Pub = array()){
        $db = new MySQL();
        $sesion = new Sesion();
        $id = $sesion->obtenerVariableSesion('idUsuario');
        
        $pub = '';        

        for ($i = 0; $i < count($Pub); $i++) {
            $pub.=  '<blockquote class="public"><input type="hidden" value="'.$Pub[$i]['id'].'" name="idPub">
                       <a href="#"><small class="col-xs-3">'.$Pub[$i]['Usuario_cuenta'].'</cite></small></a>                        <small class="fechapub">'.$Pub[$i]['Fecha'].'</small>
                       <br><img src="../fotos/'.$Pub[$i]['Usuario_cuenta'].'/'.$Pub[$i]['ImgUsuario'].'" class="img-circle" id="img-pub">
                        <p><b>'.$Pub[$i]['Texto'].'</b></p>
                        <a href="../controladores/works.php?idPub='.$Pub[$i]['id'].'" class="btn btn-default boton" id="btn btn"><i class="fa fa-suitcase"></i> Work</a >
                        <a href="./mostrarPubCom.php?idPub='.$Pub[$i]['id'].'" class="btn btn-default boton" ><span class="fui-chat"></span></i> Comentar </a>
                        <button type="button" class="btn btn-default boton" id="" data-toggle="modal" data-target="#myModal"><span class="fui-cross"></span></i>Denuncia </button><span class="badge" id="de">Esta publicion tiene ' .$Pub[$i]['works'].' work(s)</span>
                    </blockquote>';      
                }
        return $pub;

    }
    
    public function work($id){
        $db = new MySQL();
        $utilidades = new Utilidades();
        $sesion = new Sesion();
        
        $idUser=$sesion->obtenerVariableSesion('idUsuario');
        $query2 = 'SELECT work_count FROM cuenta WHERE idCuenta ='.$idUser;
        $result2 = $db->consulta($query2);
        $work_count = $result2[0]['work_count'];
        
        $query = 'SELECT works FROM publicaciones WHERE idPub='.$id;
        $result = $db->consulta($query);
        $works = $result[0]['works'];
        
        if($work_count == 0){
        
        $tabla = 'publicaciones';
        $cambio = 'works ='.$result[0]['works'].'+'. '1';
        $where = 'idPub='.$id;
        
        $resultado = $db->modificarRegistro($tabla,$cambio,$where);
        
        $tabla1 = 'cuenta';
        $cambio1 = 'work_count = 1';
        $where1 = 'idCuenta='.$idUser;
        $result = $db->modificarRegistro($tabla1,$cambio1,$where1);

        }elseif($work_count == 1){
        $tabla = 'cuenta';
        $cambio = 'work_count = 0';
        $where = 'idCuenta='.$idUser;
        $result = $db->modificarRegistro($tabla,$cambio,$where);
       
        $cant = 1;
        $tabla1 = 'publicaciones';
        $cambio1 = 'works ='.$result[0]['works'].'--'.'1';
        $where1 = 'idPub='.$id;
        
        $resultado = $db->modificarRegistro($tabla1,$cambio1,$where1);
        }
        $utilidades->Redireccionar('controladores/publicar.php');

    }
}
