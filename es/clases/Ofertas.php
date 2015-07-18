<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');

class Ofertas {


    public function mostrarFormulario(){
        $plantilla = new Plantilla();
        $plantilla->verPagina('formularioOfertas');
    }


    public function guardarOfertas($datosOferta) {
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $sesion = new Sesion();

        $tabla = 'ofertas';
        $columnas = 'idCuenta,Titulo,Detalle,Genero,Salario,Direccion,Cargo,Edad,Requisitos';

        $idCuenta = $sesion->obtenerVariableSesion('idUsuario');
        $titulo = $datosOferta['titulo'];
        $detalle = $datosOferta['detalle'];
        $genero = $datosOferta['genero'];
        $salario = $datosOferta['salario'];
        $direccion = $datosOferta['adress'];
        $cargo = $datosOferta['cargo'];
        $edad = $datosOferta['edad'];
        $requisitos = $datosOferta['requisitos'];

        $valores = '"'.$idCuenta.'","'.$titulo.'","'.$detalle.'","'.$genero.'","'.$salario.'","'.$direccion.'","'.$cargo.'","'.$edad.'","'.$requisitos.'"';

        if($edad > '17'){
            $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
            $utilidades->mostrarMensaje('¡La oferta de trabajo se creó correctamente!');
        }else
            $utilidades->mostrarMensaje('¡Lo sentimos! Ocurrió un error, por favor intente de nuevo.');

        $utilidades->Redireccionar('controladores/formOfertas.php');
    }
   /*
    public function VerOfertas() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $idUsuario = $sesion->obtenerVariableSesion('idUsuario');
        $consulta = 'select c.idOfertas as Id, c.Titulo, c.Requisitos,c.Info '
                    .' from ofertas c, Amigo a ';
        $listaOfertas = $mysql->consulta($consulta);

        $encabezado = array('Id', 'Titulo', 'Requisitos', 'Info');
        $acciones = '<a href="./listarOfertas.php?idCuenta={{id}}"><center><span class="fui-chat"></span></a>';
        $variables['listaOfertas'] = $utilidades->convertirTabla($listaOfertas, $encabezado, $acciones);
        $plantilla->verPagina('listaOfertas', $variables);
    }
    */

    public function mostrarOfertasEmpresa(){
        $db = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();


        $idu = $sesion->obtenerVariableSesion('idUsuario');
        $query = 'SELECT idOfertas as id,idCuenta,Titulo,Detalle,Genero,Salario,Direccion,Cargo,Edad,Requisitos FROM ofertas WHERE idCuenta = "' .$idu. '"';
        $result = $db->consulta($query);

        $variables['listaOfertas'] = $this->convertirOferHTML($result);
        $plantilla->verPagina('listaOfertas', $variables);

    }

    public function convertirOferHTML($Ofertas = array()){
        $db = new MySQL();
        $sesion = new Sesion();

        $oferta = '';

        for ($i = 0; $i < count($Ofertas); $i++){

            switch($Ofertas[$i]['Genero']){
                case 'F':
                $genero = "Femenino";
                break;

                case 'A':
                $genero = "Ambos";
                break;

                case 'M':
                $genero = "Masculino";
                break;
            }
            $oferta .= '<div class="panel panel-default"><input type="hidden" value="'.$Ofertas[$i]['id'].'" name="idOfer">
                          <div class="panel-heading">
                            <h3 class="panel-title"><center>'.$Ofertas[$i]['Titulo'].'</center></h3><a href="#" class="text-default dropdown-toggle" id="deE" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>
                                                                                                    <ul class="dropdown-menu" id="enfren">
                                                                                                    <li><a href="./eliminarOferta.php?idOfertas='.$Ofertas[$i]['id'].'"><i class="fa fa-trash-o"></i> Eliminar Oferta</a></li>
                                                                                                    <li><a href="./remplazarVarOferta.php?idOfertas='.$Ofertas[$i]['id'].'"><i class="fa fa-pencil"></i> Editar Oferta</a></li>
                                                                                                    <li><a href="./verInteresados.php?idOferta='.$Ofertas[$i]['id'].'"><i class="fa fa-eye"></i> Ver interesados</a></li>
                                                                                                    </ul>
                          </div>
                          <div class="panel-body">
                            <p>'.$Ofertas[$i]['Detalle'].'</p>
                            <br>
                            <p><b>Género: </b>'.$genero.'</p>
                            <p><b>Salario: $</b>'.$Ofertas[$i]['Salario'].'
                            <span class="help-block">Salario por hora</span></p>
                            <p><b>Cargo: </b>'.$Ofertas[$i]['Cargo'].'</p>
                            <p><b>Edad: </b>'.$Ofertas[$i]['Edad'].'</p>
                            <p><b>Dirección: </b>'.$Ofertas[$i]['Direccion'].'</p>
                          </div>
                        </div>';


        }
        return $oferta;


    }



########################################################################################################################################

    public function mostrarOfertasUsuario(){
        $db = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();

        $id = $sesion->obtenerVariableSesion('idUsuario');
        $query = 'SELECT idOfertas as id,idCuenta,Titulo,Detalle,Genero,Salario,Direccion,Cargo,Edad,Requisitos
        FROM ofertas WHERE idCuenta in(SELECT idCuentaAmigo FROM amigo WHERE idCuenta='.$id.')';
        $result = $db->consulta($query);

        $variables['idOferta']=$result[0]['id'];
        $variables['idEmpresa']=$result[0]['idCuenta'];
        $variables['listaOfertasUsuario'] = $this->convertirOferUsuarioHTML($result);
        $plantilla->verPagina('listaOfertasUsuario', $variables);

    }

    public function convertirOferUsuarioHTML($Ofertas = array()){
        $db = new MySQL();
        $sesion = new Sesion();

        $oferta = '';

        for ($i = 0; $i < count($Ofertas); $i++){
            switch($Ofertas[$i]['Genero']){
                case 'F':
                $genero = "Femenino";
                break;

                case 'A':
                $genero = "Ambos";
                break;

                case 'M':
                $genero = "Masculino";
                break;
            }
            $oferta .= '<div class="panel panel-default"><input type="hidden" value="'.$Ofertas[$i]['id'].'" name="idOfer">
                          <div class="panel-heading">
                            <h3 class="panel-title"><center>'.$Ofertas[$i]['Titulo'].'</center></h3><a href="#" class="dropdown-toggle" id="deE" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
                                                                                                    <ul class="dropdown-menu" id="enfren">

                                                                                                    <li><a data-toggle="modal" data-target="#app" href="#"><i class="fa fa-plus-circle"></i> Aplicar</a></li>

                                                                                                    <li><a href="verPerfilAmigo.php?idCuenta='.$Ofertas[$i]['idCuenta'].'"><i class="fa fa-eye"></i> Ver Perfil Empresa</a></li>
                                                                                                    </ul>
                          </div>
                          <div class="panel-body">
                            <p>'.$Ofertas[$i]['Detalle'].'</p>
                            <br>
                            <p><b>Género: </b>'.$genero.'</p>
                            <p><b>Salario: $</b>'.$Ofertas[$i]['Salario'].'
                            <span class="help-block">Salario por hora</span></p>
                            <p><b>Cargo: </b>'.$Ofertas[$i]['Cargo'].'</p>
                            <p><b>Edad: </b>'.$Ofertas[$i]['Edad'].'</p>
                            <p><b>Dirección: </b>'.$Ofertas[$i]['Direccion'].'</p>
                          </div>
                        </div>';
        }
        return $oferta;


    }

    public function eliminarOferta($id){
        $db = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();

        $tabla = 'ofertas';
        $where = 'idOfertas ='.$id;

        $result = $db->eliminarRegistro($tabla, $where);

        if($result){
            $utilidades->mostrarMensaje('La oferta se eliminó correctamente');
            $utilidades->Redireccionar('controladores/ofertas_empre.php');
        }else{
            $utilidades->mostrarMensaje('¡Lo sentimos! Ocurrió un error, por favor intentelo de nuevo.');
            $utilidades->Redireccionar('controladores/ofertas_empre.php');
        }
    }

    public function mostrarDatosEditar($id){
        $bd = new MySQL();
        $plantilla = new Plantilla();

        $query = 'SELECT idOfertas as id,Titulo,Detalle,Genero,Salario,Direccion,Cargo,Edad,Requisitos FROM ofertas WHERE idOfertas='.$id;
        $resultado = $bd->consulta($query);

        $variables['id']= $resultado[0]['id'];
        $variables['plaza']=$resultado[0]['Titulo'];
        $variables['detalle']=$resultado[0]['Detalle'];
        $variables['genero']=$resultado[0]['Genero'];
        $variables['salario']=$resultado[0]['Salario'];
        $variables['direccion']=$resultado[0]['Direccion'];
        $variables['cargo']=$resultado[0]['Cargo'];
        $variables['edad']=$resultado[0]['Edad'];
        $variables['requerimientos']=$resultado[0]['Requisitos'];

        $plantilla -> verPagina('formEditarOferta',$variables);
    }

    public function editarOferta($datosOferta){
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        $sesion = new Sesion();

        $tabla = 'ofertas';
        $columnas = 'idCuenta,Titulo,Detalle,Genero,Salario,Direccion,Cargo,Edad,Requisitos';
        $id = $datosOferta['id'];
        $titulo = $datosOferta['titulo'];
        $detalle = $datosOferta['detalle'];
        $genero = $datosOferta['genero'];
        $salario = $datosOferta['salario'];
        $direccion = $datosOferta['adress'];
        $cargo = $datosOferta['cargo'];
        $edad = $datosOferta['edad'];
        $requisitos = $datosOferta['requisitos'];

        $cambio = "Titulo ='".$titulo."',
                  Detalle='".$detalle."',
                  Género='".$genero."',
                  Salario='".$salario."',
                  Dirección='".$direccion."',
                  Cargo = '".$cargo."',
                  Edad = '".$edad."',
                  Requisitos = '".$requisitos."'";

        $where = 'idOfertas='.$id;

        if($edad >= '18')
            $resultado = $bd->modificarRegistro($tabla,$cambio,$where);

        if (isset($resultado))
            $utilidades->mostrarMensaje('¡La oferta de trabjado se editó correctamente!');
        else
            $utilidades->mostrarMensaje('¡Lo sentimos! Ocurrió un error, por favor intente de nuevo.');

        $utilidades->Redireccionar('controladores/formOfertas.php');
    }
}
