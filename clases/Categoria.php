<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');

class Categoria {
    

    public function mostrarFormulario(){
        $plantilla = new Plantilla();
        $plantilla->verPagina('FormularioCategoria');
    }
    

    public function guardarcategoria($datosCategoria) {        
        $bd = new MySQL();
        $utilidades = new Utilidades();
        $plantilla = new Plantilla();
        
        $tabla = 'categorias';
        $columnas = 'NombreCat,cuenta_idCuenta';

        $cat = $datosCategoria['cat'];
        $idCuenta = 1;

        $valores = '"'.$cat.'","'.$idCuenta.'"'; 
            
         if($this->validarCategoriaUnica($cat)){
            $resultado = $bd->insertarRegistro($tabla, $columnas, $valores);
             $utilidades->mostrarMensaje('La ategoria!');
            $plantilla->verPagina('');
         }else{
            $utilidades->mostrarMensaje('Lo sentimos, La categoria existe actualmente, por favor intente de nuevo.');
            $plantilla->verPagina('');
            return 0;
    }
}
 private function validarCategoriaUnica($Categoria) {
        $db = new MySQL();
         
        $consulta = 'select idCategorias from categorias where NombreCat = "'. $Categoria .'"';
        $resultado = $db->consulta($consulta);
        if(count($resultado) > 0)
            return false;
        else           
            return true;
         
    }
    public function verCategorias(){
        $db = new MySQL();
        $utilidades = new Utilidades();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        
        $query = 'SELECT idCategorias as id, NombreCat FROM categorias';
        $result = $db->consulta($query);
        
        $acciones = '<center><a href="#" class="btn btn-danger"><span class="fui-trash"></span></a>';   
        
        $encabezado = ['ID' , 'Categoria'];
        
        $variables['listaCategorias'] = $utilidades->convertirTabla($result, $encabezado, $acciones);
        
        $plantilla->verPagina('listaCategorias', $variables);

    }
    public function eliminarCategoria($id){
        $db = new MySQL();
        $plantilla = new Plantilla();
        
        $tabla = 'categorias';
        $where = 'idCategorias='.$id;
        
        $result = $db->eliminarRegistro($tabla, $where);
        
        if($result)
            $utilidades->mostrarMensaje('');
    }
}