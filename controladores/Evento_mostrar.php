<?php
require_once realpath(dirname(__FILE__) . '/../clases/AdministrarUsuarios.php');
require_once realpath(dirname(__FILE__) . '/../clases/MySQL.php');
require_once realpath(dirname(__FILE__) . '/../clases/Evento.php');


    $json = array();
    $query= "Select idEventos, FechaIni, FechaFin, Nombre as title FROM eventos";

    try{
    $db = new PDO('mysql:host=localhost;dbname=corpnet','root','');
    } catch(Exception $e){
        exit('Unable to connect to database.');
    }
$result = $db -> query($query) or die(print_r($db->errorInfo()));

echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));

?>
