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
                $columnas = 'NombreArchivo,Size,cuenta_idCuenta';

                $nombre = str_replace(' ','_',$archivo['file']['name']);
                $size = $archivo['file']['size'];
                $cuenta_idCuenta = $sesion->obtenerVariableSesion('idUsuario');

                $valores = '"'.$nombre.'","'.$size.'","'.$cuenta_idCuenta.'"';

                $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);

                $utilidades-> mostrarMensaje('¡El archivo se subió exitosamente!');
                $utilidades-> Redireccionar('controladores/crearPortafolio.php');

                if ($archivo['file']['error']>0){
                    $utilidades->mostrarMensaje('¡Lo sentimos! Ocurrió un error, intente de nuevo por favor.');
                }else{
                    $this->crearDirectorio($carpeta);
                    //echo $this->rutaServidor.$carpeta."\\";
                    move_uploaded_file(str_replace(' ',':_',$archivo['file']['tmp_name']),$this->rutaServidor.$carpeta."\\".$nombre);

                    $utilidades-> Redireccionar('controladores/crearPortafolio.php');
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
        $idPorta = $listaArchivos[0]['idPortafolio'];

        $encabezado = array('<i class="fa fa-info"></i> ID','<i class="fa fa-file-text-o"></i> Archivo');

        $acciones = '<a href="../../portafolio/'.$nombreUsuario.'/{{id}}" ><center><i class="fa fa-download"></i></a>';

         $acciones.='<a id="textRed" href="./eliminarArchivo.php?idPortafolio={{id}}" > <i class="fui-cross"></i></a></div></center>';

        $estrellas = "SELECT calificacion FROM portafolio WHERE cuenta_idCuenta = $idUsuario";
        $calcular = $mysql->consulta($estrellas);
        $numeroStrella = $calcular[0]['calificacion'];
        $i = 1;
        $ii = 1;
        $resta = 5 - $numeroStrella;
        $acciones .= '<center><div class="ec-stars-wrapper">';
                    
        while($i != $numeroStrella + 1) {
             $acciones .= '<a class="rate activaStar" href="#" data-value="'.$i.'" title="Votar con 1 estrella">&#9733;</a>';
            $i++;
        }
        while($ii != $resta + 1) {
             $acciones .= '<a class="rate" href="#" data-value="'.$i.'" title="Votar con 1 estrella">&#9733;</a>';
            $i++;
            $ii++;
        }
         $acciones .= '</div>';

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

        $estrellas = "SELECT calificacion FROM portafolio WHERE cuenta_idCuenta = $id";
        $calcular = $db->consulta($estrellas);
        $numeroStrella = $calcular[0]['calificacion'];
        $i = 1;
        $ii = 1;
        $resta = 5 - $numeroStrella;
        $encabezado = array('<i class="fa fa-info"></i> ID','<i class="fa fa-file-text-o"></i> File');
        $acciones = '<a href="../../portafolio/'.$nombreUsuario[0]['Usuario'].'/{{id}}" ><center><i class="fa fa-download"></i></a>';
        $acciones .= '<center><div class="ec-stars-wrapper">';
                    
        while($i != $numeroStrella + 1) {
             $acciones .= '<a class="rate activaStar" href="#" data-value="'.$i.'" title="Votar con 1 estrella">&#9733;</a>';
            $i++;
        }
        while($ii != $resta + 1) {
             $acciones .= '<a class="rate" href="#" data-value="'.$i.'" title="Votar con 1 estrella">&#9733;</a>';
            $i++;
            $ii++;
        }
         $acciones .= '</div>';
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
            $utilidades->mostrarMensaje('¡El archivo se eliminó exitosamente!');
        else
            $utilidades->mostrarMensaje('¡Lo sentimos! Ocurrió un problema, por favor vuelva a intentar');

        $utilidades->Redireccionar('controladores/crearPortafolio.php');
    }

    public function votarEstrella($idPorta){
        $bd = new MySQL();
        
        $partialStates = $_POST['numero'];
        $tabla ='portafolio';
        $cambio = 'calificacion ='.$estrella;
        $where = 'idPorta='.$idPorta;

        $resultado = $bd->modificarRegistro($tabla, $cambio,$where);
    }
}