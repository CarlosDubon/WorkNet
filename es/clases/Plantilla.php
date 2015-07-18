<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./Sesion.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');

class Plantilla {

    var $plantilla = 'plantilla/Plantilla';
    var $directorioVistas = '/vistas/';
    var $vars = array();
    var $sitio = '';   

    function __construct() {
        $utilidades = new Utilidades();
        $this->sitio = $utilidades->retornarURLSitio();
               
    }


    public function verPagina($contenido = '', $variables = '') {
        $this->agregarVariables($variables);
        $paginaWeb = $this->cargarContenido($contenido);
        echo $paginaWeb;
    }

    private function cargarContenido($contenido) {
        if ($contenido != '') {
            $contenido = $this->cargarArchivo($contenido);
            $contenido = $this->reemplazarVariables($contenido);
        }        
        $pagina = $this->aplicarPlantilla($contenido);
        return $pagina;
    }


    private function aplicarPlantilla($contenido = '') {
        $plantilla = $this->cargarArchivo($this->plantilla);
        $sesion = new Sesion();        
 
        if($sesion->obtenerVariableSesion('tipoUsuario') == 1){
            $menuSuperior = $this->cargarArchivo('fragmento/navbar-ini');
            $menuLateral = $this->cargarArchivo('fragmento/NavBarL-Ad');
        }
        if($sesion->obtenerVariableSesion('tipoUsuario') == 2){
            $menuSuperior = $this->cargarArchivo('fragmento/navbar-empre');
            $menuLateral = $this->cargarArchivo('fragmento/NavbarL-Empre');
            if($contenido == '')
                $contenido = $this->cargarArchivo('fragmento/contenido-trabador'); 
        }     
        if($sesion->obtenerVariableSesion('tipoUsuario') == 3){
            $menuSuperior = $this->cargarArchivo('fragmento/navbar-trabaja');
            $menuLateral = $this->cargarArchivo('fragmento/NavbarL-Trabajador');
            if($contenido=='')
                $contenido =$this->cargarArchivo('fragmento/contenido-trabador');
        }     
        if($sesion->obtenerVariableSesion('tipoUsuario') == 4){
            $menuSuperior = $this->cargarArchivo('fragmento/navbar-usuario');

            $menuLateral = $this->cargarArchivo('fragmento/NavbarL-Usuario');
            if ($contenido=='')
                $contenido=$this->cargarArchivo('fragmento/contenido-usuario');
        }     

        
        $plantilla = str_replace('{{menuSuperior}}', $menuSuperior, $plantilla);        
        $plantilla = str_replace('{{menuLateral}}', $menuLateral, $plantilla);
        
        
        if ($contenido != '')
            $pagina = str_replace('{{contenido}}', $contenido, $plantilla);
        else
            $pagina = str_replace('{{contenido}}', '', $plantilla);
        return $pagina;
    }


    private function agregarVariables($variables = '') {
        if ($variables != '')
            foreach ($variables as $var => $contenido)
                $this->vars[$var] = $contenido;
    }


    private function reemplazarVariables($pagina) {
        foreach ($this->vars as $variable => $valor) {
            $pagina = str_replace('{{' . $variable . '}}', $valor, $pagina);
        }
        return $pagina;
    }


    private function cargarArchivo($archivo) {        
        $pagina = file_get_contents($this->sitio . $this->directorioVistas . $archivo . '.php');
        return $pagina;
    }


    
    public function verPaginaSinPlantilla($contenido = 'index',$variables='') {
        $paginaWeb = $this->cargarArchivo($contenido);

        if($variables != ''){
            $this->agregarVariables($variables);
            $paginaWeb = $this->reemplazarVariables($paginaWeb);
            }
            echo $paginaWeb;
            }
}