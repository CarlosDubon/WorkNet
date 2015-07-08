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
        $columnas = 'idCuenta,Titulo,Detalle,Cargo,Edad,Requisitos';

        $idCuenta = $sesion->obtenerVariableSesion('idUsuario');
        $titulo = $datosOferta['titulo'];
        $detalle = $datosOferta['detalle'];
        $cargo = $datosOferta['cargo'];
        $edad = $datosOferta['edad'];
        $requisitos = $datosOferta['requisitos'];

        $valores = '"'.$idCuenta.'","'.$titulo.'","'.$detalle.'","'.$cargo.'","'.$edad.'","'.$requisitos.'"'; 
            
        $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);

        if ($resultado)
            $utilidades->mostrarMensaje('The job offer has been successfully saved!');
        else
            $utilidades->mostrarMensaje('Sorry! there was an error, please try again.');                
        
        $plantilla->verPagina();
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
        $query = 'SELECT idOfertas as id,idCuenta,Titulo,Detalle,Cargo,Edad,Requisitos FROM ofertas WHERE idCuenta = "' .$idu. '"';
        $result = $db->consulta($query);
        
        $variables['listaOfertas'] = $this->convertirOferHTML($result);
        $plantilla->verPagina('listaOfertas', $variables);

    }
    
    public function convertirOferHTML($Ofertas = array()){
        $db = new MySQL();
        $sesion = new Sesion();
        $oferta = '';
        
        for ($i = 0; $i < count($Ofertas); $i++){
            $oferta .= '<blockquote class="public">
                          <a href="./eliminarOferta.php?idOfertas='.$Ofertas[$i]['id'].'"><small class="text-danger" id="derecha"><i class="fa fa-trash"></i></small></a>
                          <p>Title:</p>
                          <input type="hidden" value='.$Ofertas[$i]['id'].'>
                          <small>'.$Ofertas[$i]['Titulo'].'</small>
                          <p>Detail:</p>
                          <small>'.$Ofertas[$i]['Detalle'].'</small>
                          <p>Position:</p>
                          <small>'.$Ofertas[$i]['Cargo'].'</small>
                          <p>Age:</p>
                          <small>'.$Ofertas[$i]['Edad'].'</small>
                          <p>Requirements:</p>
                          <small><i class="fa fa-ellipsis-h"></i> '.$Ofertas[$i]['Requisitos'].'</small>
                        </blockquote>';
        }
        return $oferta;
        
        
    }
    
    public function mostrarOfertasUsuario(){
        $db = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        
        
        $query = 'SELECT idOfertas as id,idCuenta,Titulo,Detalle,Cargo,Edad,Requisitos FROM ofertas';
        $result = $db->consulta($query);
        
        $variables['listaOfertasUsuario'] = $this->convertirOferUsuarioHTML($result);
        $plantilla->verPagina('listaOfertasUsuario', $variables);

    }
    
    public function convertirOferUsuarioHTML($Ofertas = array()){
        $db = new MySQL();
        $sesion = new Sesion();
        
        $oferta = '';
        
        for ($i = 0; $i < count($Ofertas); $i++){
            $oferta .= '<blockquote class="public">
                          <p>Title:</p> <small id="derecha">Empresa: <small class="text-success" id="derecha">' .$Ofertas[$i]['idCuenta'].'</small></small>
                          <small>'.$Ofertas[$i]['Titulo'].'</small>
                          <p>Detail:</p>
                          <small>'.$Ofertas[$i]['Detalle'].'</small>
                          <p>Position:</p>
                          <small>'.$Ofertas[$i]['Cargo'].'</small>
                          <p>Age:</p>
                          <small>'.$Ofertas[$i]['Edad'].'</small><a href="#" class="btn btn-success" id="iz">Aplicar</a>
                          <p>Requirements:</p>
                          <small><i class="fa fa-ellipsis-h"></i> '.$Ofertas[$i]['Requisitos'].'</small>
                        </blockquote>';
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
            $utilidades->mostrarMensaje('The offer was successfully removed.');
            $utilidades->Redireccionar('controladores/ofertas_empre.php');
        }else{
            $utilidades->mostrarMensaje('Sorry! there was an error, please try again.');
            $utilidades->Redireccionar('controladores/ofertas_empre.php');
        }
    }
       
}