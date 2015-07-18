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
        
        $query2='SELECT idSoli as id,Fecha,Tipo,cuentaAmigo,cuenta_idCuenta,user_idCuenta FROM solicitudes WHERE cuentaAmigo='.$id.' ORDER BY Fecha ASC';
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
                          <a href="./eliminarSoli.php?idSoli='.$Noti[$i]['id'].'" class="close" data-dismiss="alert">×</a>
                          El usuario <strong>'.$Noti[$i]['user_idCuenta'].'</strong>  te sigue. <a href="./agregarAmigo.php?idCuenta='.$Noti[0]['cuenta_idCuenta'].'" class="alert-link">Seguir?</a> <strong id="de">'.substr($Noti[0]['Fecha'],0,-9).'</strong>
                        </div>';
            break;
            case 2:
                $noti.='<div class="alert alert-dismissible alert-danger">
                          <a href="./eliminarSoli.php?idSoli='.$Noti[$i]['id'].'" class="close" data-dismiss="alert">×</a>
                          Su trabajador <strong>'.$Noti[$i]['user_idCuenta'].'</strong>  creó un evento. <a href="../vistas/calendarioEmpresa.php" class="alert-link">Ver Evento</a> <strong id="de">'.substr($Noti[0]['Fecha'],0,-9).'</strong>
                        </div>';
            break;
            }
        }
         return $noti;

    }
    
    public function eliminarNotifi($id){
        $bd= new MySQL();
        $utilidades = new Utilidades();
        $sesion = new Sesion();
        
        $idUser = $sesion->obtenerVariableSesion('idUsuario');
        $tabla='Solicitudes';
        $where = 'idSoli='.$id;
        
        $resultado = $bd->eliminarRegistro($tabla,$where);
        
        if($resultado){
            $new = 'SELECT new_count FROM cuenta WHERE idCuenta ='.$idUser;
                            $count = $bd->consulta($new);

                            $contador = $count[0]['new_count'];
                            $tabla2 = 'cuenta';
                            $cambio2 = 'new_count='.$count[0]['new_count'].'-'.'1';
                            $where2 = 'idCuenta='.$idUser;

                            $sumar = $bd ->modificarRegistro($tabla2,$cambio2,$where2);
                            
                }
        $utilidades->Redireccionar('controladores/verNotificaciones.php');

        }
}
    
