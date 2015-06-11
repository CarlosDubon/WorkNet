<?php

require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');


class Chat {

    public function mostrarChat($idAmigo) {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();

        $consulta = ' select a.* from (select c.idChat as idChat,c.Texto as Texto,c.FechaChat as FechaChat,ami.Usuario as usuarioAmigo,0 as recibe from Chat c, cuenta ami '
                . ' where ami.idCuenta = c.idAmigo and c.cuenta_idcuenta = ' . $sesion->obtenerVariableSesion('idUsuario');
        $consulta .= ' and c.idAmigo = ' . $idAmigo;        
        $consulta .=' UNION ';
        $consulta .= 'select c.idChat as idChat,c.Texto as Texto,c.FechaChat as FechaChat,ami.Usuario as usuarioAmigo,1 as recibe from Chat c, cuenta ami '
                . ' where ami.idCuenta = c.cuenta_idCuenta and c.idAmigo = ' . $sesion->obtenerVariableSesion('idUsuario');
        $consulta .= ' and c.cuenta_idcuenta = ' . $idAmigo;
        $consulta .= ') a order by a.idChat DESC';
        
        $resultado = $mysql->consulta($consulta);

        //print_r($resultado);
        $variables['chatearUsuarios'] = $this->convertirChatHtml($resultado);
        $variables['miamigo'] = $idAmigo;
        
        $plantilla->verPagina('ventanaChat',$variables);
    }

    public function convertirChatHtml($mensajes = array()) {
        $sesion = new Sesion();
        $mysql = new MySQL();
        
        $consulta = ' select c.ImgCuenta from cuenta c where c.idCuenta = ' . $sesion->obtenerVariableSesion('idUsuario');        
        
        $resultado = $mysql->consulta($consulta);
        
        $variables['photo'] = $resultado[0]['ImgCuenta'];

        
        $chats = '';        
        //print_r($mensajes);

        for ($i = 0; $i < count($mensajes); $i++) {
            if ($mensajes[$i]['recibe'] == 0) {
               $chats .= '<li class="left clearfix"><span class="chat-img pull-left">
                                <img src="../fotos/'.$sesion->obtenerVariableSesion('nombreUsuario').'/'.$resultado[0]['ImgCuenta'].'"" alt="User Avatar" class="img-circle" id="img-chat">
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">'.$sesion->obtenerVariableSesion('nombreUsuario')
                                  .'</strong> <small class="pull-right text-muted">
                                        <span class="fui-chat"></span>'.$mensajes[$i]['FechaChat'].'</small>
                                </div>
                                <p>'.$mensajes[$i]['Texto'].'</p>
                            </div>
                        </li> ';
            } else {
                $chats .='<li class="right clearfix"><span class="chat-img pull-right">
                                <img src="../vistas/recursos/images/yo.gif" alt="User Avatar" class="img-circle">
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="fui-chat"></span>'.$mensajes[$i]['FechaChat'].'</small>
                                    <strong class="pull-right primary-font">'.$mensajes[$i]['usuarioAmigo'].'</strong>
                                </div>
                                <p>
                                    '.$mensajes[$i]['Texto'].'</p>
                            </div>
                        </li>'; 
                
            }            
        }
        return $chats;
    }
    

    public function guardarMensaje($datosMensaje) {        
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $sesion = new Sesion();
        
        $tabla = 'Chat';
        $columnas = 'FechaChat,Texto,cuenta_idCuenta,idAmigo';

        $FechaChat= date("Y").'-'.date("m").'-'.date("d") ;
        $Texto=$datosMensaje['mensaje'];
        $usuario = $sesion->obtenerVariableSesion('idUsuario');
        $idAmigo = $datosMensaje['idAmigo'];
        $recibe = '0';        

        $valores = '"'.$FechaChat . '","' . 
                    $Texto . '","' . 
                    $usuario . '","' . 
                    $idAmigo . '"';        
        $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);        
        if (!$resultado)            
            $utilidades->mostrarMensaje('Lo sentimos!, Ocurrio un error, por favor intente de nuevo!.');                            
        $this->mostrarChat($idAmigo);
    }
    public function actualizarChat($idAmigo) {
            $plantilla = new Plantilla();
            $mysql = new MySQL();
            $sesion = new Sesion();

                    $consulta = ' select a.* from (select c.idChat as idChat,c.Texto as Texto,c.FechaChat as FechaChat,ami.Usuario as usuarioAmigo,0 as recibe from Chat c, cuenta ami '
                    . ' where ami.idCuenta = c.idAmigo and c.cuenta_idcuenta = ' . $sesion->obtenerVariableSesion('idUsuario');
                    $consulta .= ' and c.idAmigo = ' . $idAmigo; 
                    $consulta .=' UNION ';
                    $consulta .= 'select c.idChat as idChat,c.Texto as Texto,c.FechaChat as FechaChat,ami.Usuario as usuarioAmigo,1 as recibe from Chat c, cuenta ami '
                    . ' where ami.idCuenta = c.cuenta_idCuenta and c.idAmigo = ' . $sesion->obtenerVariableSesion('idUsuario');
                    $consulta .= ' and c.cuenta_idcuenta = ' . $idAmigo;
                    $consulta .= ') a order by a.idChat DESC';

                    $resultado = $mysql->consulta($consulta);

                    //print_r($resultado);
                    $variables['chatearUsuarios'] = $this->convertirChatHtml($resultado);
                    $variables['miamigo'] = $idAmigo;

                    $plantilla->verPaginaSinPlantilla('mensajesChat','',$variables);
    }
}
