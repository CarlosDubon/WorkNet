<?php 

    require_once realpath(dirname(__FILE__) . '/./MySQL.php');
    require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
    require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
    require_once realpath(dirname(__FILE__) . '/./Sesion.php');

class Buscar{
    
    public function buscarCategiras(){
	$bd = new MySQL();

	$partialStates = $_POST['partialState'];

	$query = "SELECT idCategorias as id, NombreCat FROM categorias WHERE NombreCat LIKE '%$partialStates%' ";
	$state = $bd->consulta($query);
        
        for($i=0;$i<count($state);$i++)
		echo '<div>'.$state[$i]['NombreCat'].'<a href="./busquedaUsuarios.php?NombreCat='.$state[$i]['NombreCat'].'"><i class="fa fa-search" id="de"></i></a></div>';
    }
    
    public function verUsuariosPorCat($categoria){
        $bd = new MySQL();
        $plantilla = new Plantilla();
        
        $query ='SELECT Usuario,imgCuenta,Empresa,Categoria FROM cuenta WHERE Categoria ="'.$categoria.'"';
        $resultado= $bd->consulta($query);
        $variables['Usuarios']=$this->convertirUsuariosHTML($resultado);
        $variables['Categoria']=$resultado[0]['Categoria'];
        
        $plantilla->verPagina('BusquedaUsuarios',$variables);
    }
    
    public function convertirUsuariosHTML($U = array()){
        $u = '';
        
        for($i=0;$i<count($U); $i++){
            $u='<div class="panel panel-default">
                  <div class="panel-body">
                    <img src="../fotos/'.$U[$i]['Usuario'].'/'.$U[$i]['imgCuenta'].'" class="img-circle" > '
                .$U[$i]['Empresa'].'
                <a href="" id="deU"><i class="fa fa-user-plus"></i></a>
                  </div>
                </div>';
        }
        return $u;
    }
}