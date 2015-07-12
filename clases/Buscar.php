<?php 

    require_once realpath(dirname(__FILE__) . '/./MySQL.php');
    require_once realpath(dirname(__FILE__) . '/./Plantilla.php');
    require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
    require_once realpath(dirname(__FILE__) . '/./Sesion.php');

class Buscar{
    
    public function buscarCategiras(){
	$bd = new MySQL();

	$partialStates = $_POST['partialState'];

	$query = "SELECT idCategorias as id, NombreCat FROM categorias WHERE NombreCat LIKE '%$partialStates%'";
	$state = $bd->consulta($query);
        
        for($i=0;$i<count($state);$i++)
		echo '<div>'.$state[$i]['NombreCat'].'</div>';
    }
}