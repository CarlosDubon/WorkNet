<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');

class Portafolio {
var $rutaServidor='C:\\xampp\\htdocs\\WorkNet\\portafolio\\';

    public function mostrarFormulario(){
        $plantilla = new Plantilla();
        $plantilla->verPagina('vistaPortafolio');
    }
    
    public function crearDirectorio($nombreDirectorio='prueba'){
        if(!is_dir($this->rutaServidor.$nombreDirectorio)){        
            mkdir($this->rutaServidor.$nombreDirectorio, 0777);
        }
    }
    
    public function subirArchivo($archivo){
                $bd = new MySQL();
                $sesion = new Sesion();
                $utilidades= new Utilidades();
                $plantilla = new Plantilla();
                $carpeta=$sesion->obtenerVariableSesion('nombreUsuario');
        
                $tabla = 'portafolio';
                $columnas = 'NombreArchivo,FechaSubida,Size,cuenta_idCuenta';
        
                $nombre = str_replace(' ','_',$archivo['file']['name']);
                $size = $archivo['file']['size'];
                $cuenta_idCuenta = $sesion->obtenerVariableSesion('idUsuario');
                $fecha = '00-00-0000';
        
                $valores = '"'.$nombre.'","'.$fecha.'","'.$size.'","'.$cuenta_idCuenta.'"';
        
                $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
                
                $utilidades-> mostrarMensaje('El archivo se subio exitosamente!');
        
                $plantilla->verPagina();
        
                if ($archivo['file']['error']>0){
                    $utilidades->mostrarMensaje('Lo sentimos, Ocurrio un error, intente de nuevo por favor.');
                }else{
                    $this->crearDirectorio($carpeta);
                    //echo $this->rutaServidor.$carpeta."\\";
                    move_uploaded_file(str_replace(' ',':_',$archivo['file']['tmp_name']),$this->rutaServidor.$carpeta."\\".$nombre);
                    
                    $plantilla->verPagina();
                }
            }
     public function VerArchivos() {
        $plantilla = new Plantilla();
        $mysql = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();

        $idUsuario = $sesion->obtenerVariableSesion('idUsuario');
        $nombreUsuario = $sesion->obtenerVariableSesion('nombreUsuario');
     
        $consulta = 'SELECT idPortafolio, NombreArchivo as id FROM portafolio WHERE cuenta_idCuenta="'.$idUsuario.'"';
        
        $listaArchivos = $mysql->consulta($consulta);
        
        $encabezado = array('<i class="fa fa-info"></i> ID','<i class="fa fa-file-text-o"></i> Archivo');

        $acciones = '<a href="../portafolio/'.$nombreUsuario.'/{{id}}" ><center><i class="fa fa-download"></i></a>';
        
         $acciones.='<a href="./eliminarArchivo.php?idPortafolio={{id}}" ><center><i class="fui-cross"></i></a>';
         $acciones .= '<center><div class="ec-stars-wrapper">
                    <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                    <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                    <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                    <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                    <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                    </div>';

      
        $variables['listaArchivos'] = $utilidades->convertirTabla($listaArchivos, $encabezado, $acciones);

        
        $plantilla->verPagina('vistaPortafolio', $variables);
    }
    
    public function VerArchivosAmigo($id){
        $plantilla = new Plantilla();
        $db = new MySQL();
        $sesion = new Sesion();
        $utilidades = new Utilidades();
        
        $usuario = 'SELECT Usuario FROM cuenta WHERE idCuenta ='.$id;
        $nombreUsuario = $db->consulta($usuario);
        
        $nombreUsuario[0]['Usuario'];
        
        $query = "SELECT idPortafolio, NombreArchivo as id FROM portafolio WHERE cuenta_idCuenta = $id";
        $resultado = $db->consulta($query);
        
        $encabezado = array('<i class="fa fa-info"></i> ID','<i class="fa fa-file-text-o"></i> File');
        $acciones = '<a href="../portafolio/'.$nombreUsuario[0]['Usuario'].'/{{id}}" ><center><i class="fa fa-download"></i></a>';
        $acciones .= '<center><div class="ec-stars-wrapper">
                    <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                    <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                    <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                    <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                    <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                    </div>';

        $variables['listaArchivos'] = $utilidades->convertirTabla($resultado, $encabezado, $acciones);
        
        $plantilla->verPagina('vistaPortafolioV', $variables);


    }
    public function eliminarArchivo($id){
        $sesion = new Sesion();
        $db = new MySQL();
        $utilidades = new Utilidades();
        
        $carpeta = $sesion->obtenerVariableSesion('nombreUsuario');
        unlink($this->rutaServidor.$carpeta.'\\'.$id);  
        
        $tabla='portafolio';
        $where='NombreArchivo="'.$id.'"';
        $resultado = $db->eliminarRegistro($tabla, $where);
        
        if($resultado)
            $utilidades->mostrarMensaje('The file was deleted successfuly');
        else
            $utilidades->mostrarMensaje('Sorry!,something is wrong, please try again');
        
        $utilidades->Redireccionar('controladores/crearPortafolio.php');
    }
       
}
