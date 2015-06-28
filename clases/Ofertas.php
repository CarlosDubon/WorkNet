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
        
        if($edad >= '18')
            $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);

        if (isset($resultado))
            $utilidades->mostrarMensaje('La oferta de trabjado se creo correctamente!');
        else
            $utilidades->mostrarMensaje('Lo sentimos!,Ocurrio un error, por favor intente de nuevo.');                
        
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
            
            switch($Ofertas[0]['Genero']){
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
            $oferta .= '<div class="panel panel-default"><input type="hidden" value="'.$Ofertas[0]['id'].'" name="idOfer">
                          <div class="panel-heading">
                            <h3 class="panel-title"><center>'.$Ofertas[0]['Titulo'].'</center></h3><a href="#" class="dropdown-toggle" id="deE" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>
                                                                                                    <ul class="dropdown-menu" id="enfren">
                                                                                                    <li><a href="./eliminarOferta.php?idOfertas='.$Ofertas[0]['id'].'"><i class="fa fa-trash-o"></i> Eliminar Oferta</a></li>
                                                                                                    <li><a href="./verInteresados.php?idOferta='.$Ofertas[0]['id'].'"><i class="fa fa-eye"></i> Ver interesados</a></li>
                                                                                                    </ul>
                          </div>
                          <div class="panel-body">
                            <p>'.$Ofertas[0]['Detalle'].'</p>
                            <br>
                            <p><b>Genero: </b>'.$genero.'</p>
                            <p><b>Salario: $</b>'.$Ofertas[0]['Salario'].'
                            <span class="help-block">Salario por hora</span></p>
                            <p><b>Cargo: </b>'.$Ofertas[0]['Cargo'].'</p>
                            <p><b>Edad: </b>'.$Ofertas[0]['Edad'].'</p>
                            <p><b>Direccion: </b>'.$Ofertas[0]['Direccion'].'</p>
                          </div>
                        </div>';
                        
            
        }
        return $oferta;
        
        
    }
    
    public function mostrarOfertasUsuario(){
        $db = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        
        
        $query = 'SELECT idOfertas as id,idCuenta,Titulo,Detalle,Genero,Salario,Direccion,Cargo,Edad,Requisitos FROM ofertas';
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
            switch($Ofertas[0]['Genero']){
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
            $oferta .= '<div class="panel panel-default"><input type="hidden" value="'.$Ofertas[0]['id'].'" name="idOfer">
                          <div class="panel-heading">
                            <h3 class="panel-title"><center>'.$Ofertas[0]['Titulo'].'</center></h3><a href="#" class="dropdown-toggle" id="deE" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
                                                                                                    <ul class="dropdown-menu" id="enfren">
                                                                                                    
                                                                                                    <li><a data-toggle="modal" data-target="#app" href="#"><i class="fa fa-plus-circle"></i> Aplicar</a></li>
                                                                                                    
                                                                                                    <li><a href="verPerfilAmigo.php?idCuenta='.$Ofertas[0]['idCuenta'].'"><i class="fa fa-eye"></i> Ver Perfil Empresa</a></li>
                                                                                                    </ul>
                          </div>
                          <div class="panel-body">
                            <p>'.$Ofertas[0]['Detalle'].'</p>
                            <br>
                            <p><b>Genero: </b>'.$genero.'</p>
                            <p><b>Salario: $</b>'.$Ofertas[0]['Salario'].'
                            <span class="help-block">Salario por hora</span></p>
                            <p><b>Cargo: </b>'.$Ofertas[0]['Cargo'].'</p>
                            <p><b>Edad: </b>'.$Ofertas[0]['Edad'].'</p>
                            <p><b>Direccion: </b>'.$Ofertas[0]['Direccion'].'</p>
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
            $utilidades->mostrarMensaje('La oferta se elimino correctamente');
            $utilidades->Redireccionar('controladores/ofertas_empre.php');
        }else{
            $utilidades->mostrarMensaje('Lo sentimos, Ocurrio un error, por favor intentelo de nuevo.');
            $utilidades->Redireccionar('controladores/ofertas_empre.php');
        }
    }
       
}