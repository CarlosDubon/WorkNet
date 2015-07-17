<?php

class Amigos {

    public function VerPersonas() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $idUsuario = $sesion->obtenerVariableSesion('idUsuario');

        $consulta = 'select idCuenta as id,Usuario,Nombre,Apellido,Empresa from cuenta '
                . ' where idCuenta not in( select idCuentaAmigo from Amigo where idCuenta =' . $idUsuario . ' )';
        $listaUsuarios = $mysql->consulta($consulta);
        $encabezado = array('ID', 'User', 'Name', 'Surname', 'Enterprise');

        $acciones = '<a href="./agregarAmigo.php?idCuenta={{id}}"><i class="fa fa-user-plus"></i></a>';
        $acciones .= '<a href="./verPerfilAmigo.php?idCuenta={{id}}"> &nbsp Perfil</a>';



        $variables['listaUsuarios'] = $utilidades->convertirTabla($listaUsuarios, $encabezado, $acciones);


        $sesion->agregarVariableSesion('permisoAgregarAmigo', '1');
        $plantilla->verPagina('listaPersonas', $variables);
    }


    public function agregarAmigo($id) {
        $tabla = 'Amigo';
        $columnas = 'idCuenta,idCuentaAmigo';

        $mysql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();

        if ($sesion->existeVariableSesion('permisoAgregarAmigo')) {
            $sesion->eliminarVariableSesion('permisoAgregarAmigo');
            if ($sesion->existeVariableSesion('idUsuario')) {
                $valores = $sesion->obtenerVariableSesion('idUsuario') . ',' . $id;
                $resultado = $mysql->insertarRegistro($tabla, $columnas, $valores);
                if ($resultado){
                    $utilidades->mostrarMensaje('You are now following this User!');
                            $new = 'SELECT new_count FROM cuenta WHERE idCuenta ='.$id;
                            $count = $mysql->consulta($new);

                            $contador = $count[0]['new_count'];
                            $tabla2 = 'cuenta';
                            $cambio2 = 'new_count='.$contador.'+'.'1';
                            $where2 = 'idCuenta='.$id;

                            $sumar = $mysql ->modificarRegistro($tabla2,$cambio2,$where2);

                            $tabla3 = 'solicitudes';
                            $columnas3 ='Tipo,cuentaAmigo,cuenta_idCuenta,user_idCuenta';
                            $tipo = 1;
                            $idCuenta_cuenta = $sesion->obtenerVariableSesion('idUsuario');
                            $user_idCuenta=$sesion->obtenerVariableSesion('nombreUsuario');
                            $valores3 = '"' .$tipo. '","' 
                                         .$id.'","'
                                         .$idCuenta_cuenta.'","'
                                         .$user_idCuenta.'"';
                            $consuLta= $mysql ->insertarRegistro($tabla3,$columnas3,$valores3);
                }
                else
                    $utilidades->mostrarMensaje('Sorry! There was a problem. Please try again.');
            }
        }

       

        $utilidades->Redireccionar('controladores/publicar.php');
    }


    public function VerAmigos() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $pn ='';
        $pu='./verPerfilUsuarioAmigo.php?idCuenta={{id}}';
        $pe='./verPerfilAmigo.php?idCuenta={{id}}';

        $verificar = "SELECT Tipo FROM cuenta";
        $exe = $mysql->consulta($verificar);
        for ($i=0; $i<count($exe);$i++){
            $tipou=$exe[$i]['Tipo'];
                if ($tipou === '2')
                    $pn = $pe;
                elseif($tipou ==='4')
                    $pE = $pu;
        }

        $idUsuario = $sesion->obtenerVariableSesion('idUsuario');

        $consulta = 'select c.idCuenta as id, c.Usuario, c.Nombre,c.Apellido '
                    .' from cuenta c, Amigo a '
                    .' where a.idCuentaAmigo = c.idCuenta '
                    .' and a.idCuenta = ' . $idUsuario;

        $listaAmigos = $mysql->consulta($consulta);

        $encabezado = array('ID', 'User', 'Name', 'Surname');

        $acciones = '<a href="./chatear.php?idCuenta={{id}}"><span class="fui-chat"> </span></a>';
        $acciones .= '<a href="./eliminarAmigo.php?idCuenta={{id}}" id="textRed"><span class="fui-trash"></span></a>';
        $acciones .= '<a href="'.$pn.'">&nbsp Perfil</a>';


        $variables['listaAmigos'] = $utilidades->convertirTabla($listaAmigos, $encabezado, $acciones);


        $plantilla->verPagina('listaAmigos', $variables);
    }
    public function eliminarAmigo($id){
        $db = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $tabla = 'amigo';
        $where = 'idCuentaAmigo ='.$id;

        $resultado = $db->eliminarRegistro($tabla, $where);

        if($resultado){
            $utilidades->mostrarMensaje('You are not following this user any more.');
            $utilidades->redireccionar('controladores/mensajes.php');
        }else
            $utilidades->mostrarMensaje('Sorry! There was a problem. Please try again.');


    }
    
    public function verificarAmigos(){
        $db = new MySQL();
        $sesion = new Sesion();
        
        
    }

}