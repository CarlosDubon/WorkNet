<?php

class MySQL {
    
    private $mostrarConsultas = false;
    private $util;


    private $servidor = 'localhost';
    private $usuario = 'root';
    private $password = '';
    private $baseDeDatos = 'corpnet';
    private $conexion; 
    private $total_consultas = 0;


    public function MySQL() {
        if($this->mostrarConsultas)
            $this->util = new Utilidades();
        if (!isset($this->conexion)) {
            $this->conexion = (mysql_connect($this->servidor, $this->usuario, $this->password))or die(mysql_error());
            mysql_select_db($this->baseDeDatos, $this->conexion) or die(mysql_error());
        }
    }

  
    public function consulta($consulta) {
        $salida = array();        
        $this->total_consultas++;
        if($this->mostrarConsultas){
               echo $sql;
               $this->util->mostrarMensaje($consulta);       
        }            
        
        $resultado = mysql_query($consulta, $this->conexion);

        if (!$resultado) {
            $salida[0] = 'MySQL Error: ' . mysql_error();
        } else {
            while ($row = mysql_fetch_assoc($resultado)) {
                $salida[] = $row;
            }
        }
        return $salida;
    }

    public function getTotalConsultas() {
        return $this->total_consultas;
    }


    public function num_rows($resultado) {
        return mysql_num_rows($resultado);
    }


    public function cerrarConexion() {
        mysql_close($this->conexion);
    }

    public function insertarRegistro($tabla, $columnas, $valores) {               
        $sql = 'insert into ' . $tabla . '(' . $columnas . ') values(' . $valores . ')';       
        
        if($this->mostrarConsultas){
            echo $sql;
            $this->util->mostrarMensaje ($sql);
        }                
        $resultado = mysql_query($sql, $this->conexion);                        
        return $resultado;
    }

    public function modificarRegistro($tabla,$cambio,$where) {               
        $sql = 'update '.$tabla.' set ' . $cambio . ' where ' . $where;       
        
        if($this->mostrarConsultas){
            echo $sql;
            $this->util->mostrarMensaje ($sql);
        }                
        $resultado = mysql_query($sql, $this->conexion);                        
        return $resultado;
    }
    

     public function eliminarRegistro($tabla,$where) {               
        $sql = 'delete from '.$tabla.' where '. $where;       
        
        if($this->mostrarConsultas){
            echo $sql;
            $this->util->mostrarMensaje ($sql);
        }                
        $resultado = mysql_query($sql, $this->conexion);                        
        return $resultado;
    }

}

?>