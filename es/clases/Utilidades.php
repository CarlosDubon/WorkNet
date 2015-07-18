<?php


class Utilidades {
var $carpetaSitio='/WorkNet/es';
 
    public function redireccionar($url = 'index.php') {
        $respuesta = "<script type='text/javascript'> window.location='" . $this->retornarURLSitio() . '/' . $url . "'; </script>";        
        echo $respuesta;
    }


    function retornarURLSitio() {
        $url = "http://" . $_SERVER['HTTP_HOST'] /*. ":" . $_SERVER['SERVER_PORT']*/.$this->carpetaSitio;        
        return $url;
    }


    public function mostrarArreglo($arreglo = array()) {
        $sesion = 'VARIABLES DEL ARREGLO \n';
        foreach ($arreglo as $elemento => $valor)
            $sesion .= $elemento . ' : ' . $valor . '\n';
        echo "<script type='text/javascript'> alert('" . $sesion . "'); </script>";
    }


    public function convertirTabla($arreglo = array(), $encabezado = array(),$acciones='') {
        $encabezado[]="Opciones";
        $tabla = '<table id="miTabla" class="display" cellspacing="0" width="100%">';
        $tabla .= '<thead><tr>';

        for ($i = 0; $i < count($encabezado); $i++) {
            $tabla .= '<th>' . $encabezado[$i] . '</th>';
        }
        $tabla .='</tr></thead>';

        $tabla .= '<tbody>';
        for ($i = 0; $i < count($arreglo); $i++) {            
            $tabla .= '<tr>';                                    
            $arreglo[$i][]=$this->reemplazarVariables($acciones,'id', $arreglo[$i]['id']);
            foreach ($arreglo[$i] as $elemento => $valor) {
                
                $tabla .='<td>' . $valor . '</td>';
            }            
            $tabla .='</tr>';
        }
        $tabla .='</tbody>';

        return $tabla;
    }
    

    private function reemplazarVariables($pagina,$variable,$valor) {                        
            $pagina = str_replace('{{' . $variable . '}}', $valor, $pagina);        
        return $pagina;
    }
    

    public function mostrarMensaje($datos = '') {        
        echo "<script type='text/javascript'> alert('" . $datos . "'); </script>";
        /*echo "<div class='notifications top-left'></div>"
        . "$('.top-left').notify({message: { text: '".$datos."' }}).show();";*/
        
    }
}