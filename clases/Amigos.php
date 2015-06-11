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
        $encabezado = array('ID', 'Usuario', 'Nombre', 'Apellido', 'Empresa');

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
                if ($resultado)
                    $utilidades->mostrarMensaje('Se ha añidido exitosamente el usuario a su lista de amigos');
                else
                    $utilidades->mostrarMensaje('Lo sentimos, ocurrio un problema, por favor intente de nuevo .');
            }
        }
        $plantilla->verPagina();
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
        
        $encabezado = array('ID', 'Usuario', 'Nombre', 'Apellido');

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
            $utilidades->mostrarMensaje('El usuario se elimino exitosamente!.');
            $utilidades->redireccionar('controladores/mensajes.php');
        }else
            $utilidades->mostrarMensaje('Lo sentimos, ocurrio un problema, por favor intente de nuevo.');

        
    }

}
