<?php
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');

class Notificaciones{
    public function verPanelNews(){
        $bd = new MySQL();
        $plantilla = new Plantilla();
        $sesion = new Sesion();
        
        $id = $sesion->obtenerVariableSesion('idUsuario');
        $query='SELECT new_count FROM cuenta WHERE idCuenta = '.$id;
        $resultado = $bd->consulta($query);
        
        $query2='SELECT idSoli as id,Fecha,Tipo,cuentaAmigo,cuenta_idCuenta,user_idCuenta FROM solicitudes WHERE cuentaAmigo='.$id;
        $resultado2 = $bd->consulta($query2);
        
        $variables['user']= $resultado2[0]['user_idCuenta'];
        $variables['id']= $resultado2[0]['cuenta_idCuenta'];
        $variables['listaNew']= $this->convertirNotiHTML($resultado2);
        $variables['news']=$resultado[0]['new_count'];
        
        $plantilla->verPagina('verNotificaciones', $variables);
    }
    
    
    public function convertirNotiHTML($Noti = array()){
        $bd = new MySQL();
        $sesion = new Sesion();
        
        $idUser = $sesion->obtenerVariableSesion('idUsuario');
        
        $noti = '';
        
       for($i=0; $i < count($Noti); $i++ ){
        
       switch ($Noti[$i]['Tipo']){
            case 1:

                $noti.='<div class="alert alert-dismissible alert-info">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          El ususario <strong>'.$Noti[$i]['user_idCuenta'].'</strong>  te sigue. <a href="./agregarAmigo.php?idCuenta='.$Noti[0]['cuenta_idCuenta'].'" class="alert-link">Segir?</a> <strong id="de">'.substr($Noti[0]['Fecha'],0,-9).'</strong>
                        </div>';
            break;
            case 2:
                $noti.='<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          Su trabajador <strong>'.$Noti[$i]['user_idCuenta'].'</strong>  Creo un evento. <a href="../vistas/calendarioEmpresa.php" class="alert-link">Ver Evento</a> <strong id="de">'.substr($Noti[0]['Fecha'],0,-9).'</strong>
                        </div>';
            break;
            }
        }
         return $noti;

    }
    
}
