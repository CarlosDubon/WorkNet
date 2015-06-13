<?php

require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');


class Comentarios {
    
   public function mostrarPubCom($idPub){
        $bd = new MySQL();
        $plantilla = new Plantilla();
        
        $query = 'SELECT idPub as id,Texto,Fecha,Usuario_cuenta,works FROM publicaciones WHERE idPub ='.$idPub;
        $resultado = $bd->consulta($query);
       
        $query2 = 'SELECT idComentario,Usuario,imgUsuario,Comentario FROM comentarios WHERE idPub='.$idPub;
        $resultado2 = $bd->consulta($query2);

        $variables['comentarios'] = $this->convertirComentsHTML($resultado2);
        $variables['Id']=$resultado[0]['id'];
        $variables['publicacion'] = $this->convertirPubHTML($resultado);
        
        $plantilla->verPagina('comentarioPub',$variables);
       
        
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
                       <a href="#"><small class="col-xs-3">'.$Pub[$i]['Usuario_cuenta'].'</cite></small></a><small class="fechapub">'.$Pub[$i]['Fecha'].'</small>
                       <br><img src="../fotos/'.$sesion->obtenerVariableSesion('nombreUsuario').'/'.$photo.'" class="img-circle" id="img-pub">
                        <p><b>'.$Pub[$i]['Texto'].'</b></p>
                    </blockquote>';      
                }
        return $pub;

    }
    public function guardarComentario($coment){
        $db = new MySQL();
        $sesion = new Sesion;
        $utilidades = new Utilidades();
        
        $id = $sesion->obtenerVariableSesion('idUsuario');
        $query = 'SELECT imgCuenta FROM cuenta WHERE idCuenta='.$id;
        $result = $db->consulta($query);
        
        $tabla = 'comentarios';
        $columnas = 'Usuario, imgUsuario,Comentario,idPub';
        $usuario = $sesion->obtenerVariableSesion('nombreUsuario');
        $photo = $result[0]['imgCuenta'];
        $comentario = $coment['comentario'];
        $idPub = $coment['id'];
        
        $valores= '"'.$usuario.'","'
                     .$photo.'","'
                     .$comentario.'","'
                     .$idPub.'"';
        
        $ingreso = $db->insertarRegistro($tabla, $columnas, $valores);
        
        if($ingreso == FALSE)
            $utilidades ->mostrarMensaje('Lo sentimos, ocurrio un problema, por favor vuelva a intentar');
        $utilidades->Redireccionar('controladores/publicar.php');
    }

    public function convertirComentsHTML($Com = array()){
        $bd = new MySQL();
        
        $com = '';
        for ($i = 0; $i < count($Com); $i++) {
        $com .= '<blockquote class="public">
                       <a href="#"><small class="col-xs-3">'.$Com[$i]['Usuario'].'</cite></small></a>
                       <br><img src="../fotos/'.$Com[$i]['Usuario'].'/'.$Com[$i]['imgUsuario'].'" class="img-circle" id="img-pub">
                        <p><b>'.$Com[$i]['Comentario'].'</b></p>
                    </blockquote>'; 
        
        }
        return $com;
    }
}