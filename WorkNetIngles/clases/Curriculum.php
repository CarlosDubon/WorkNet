<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');

class Curriculum {
    public function mostrarFormulario(){
        $plantilla = new Plantilla();
         
        $plantilla->verPagina('fromCurriculum');
    }
    
    public function crearCurriculum($datos){
        $db = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();
        
        $tabla = 'curriculum';
        
        $columnas='Nombre_Completo,Telefono,Celular,direccion,FormacionAc,Experiencia,Referencia1,TelRef1,Referencia2,TelRef2,Referencia3,TelRef3,idCuenta_Cuenta';

        $id = $sesion->obtenerVariableSesion('idUsuario');

        $nombre = $datos['name'];
        $tel = $datos['tel'];
        $cel = $datos['cel'];
        $dic = $datos['dic'];
        $academica = $datos['academica'];
        $ex = $datos['ex'];
        $ref1 = $datos['ref1'];
        $ref2 = $datos['ref2'];
        $ref3 = $datos['ref3'];
        $tel1 = $datos['tel1'];
        $tel2 = $datos['tel2'];
        $tel3 = $datos['tel3'];
        
        
        
        $valores = '"'.$nombre.'","'
                    .$tel.'","'
                    .$cel.'","'
                    .$dic.'","'
                    .$academica.'","'
                    .$ex.'","'
                    .$ref1.'","'
                    .$tel1.'","'
                    .$ref2.'","'
                    .$tel2.'","'
                    .$ref3.'","'
                    .$tel3.'","'
                    .$id.'"'; 
        
        $result = $db->insertarRegistro($tabla, $columnas, $valores);
        
        if($result){
            $utilidades->mostrarMensaje("The resumé was successfully saved.");
            $utilidades->Redireccionar('controladores/formCurriculum.php');
        }
        else{
            $utilidades->mostrarMensaje("Sorry! there was an error, please try again.");
            $utilidades->Redireccionar('controladores/formCurriculum.php');
        }

    }
    
    public function convertirCurHTML($C = array()){
        
        $c = '';
        
        for ($i = 0; $i < count($C); $i++){
            $c.='<div class="panel panel-default">
                  <div class="panel-heading">'.$C[$i]['Nombre_Completo'].'</div>
                    <div class="panel-body">
                        <p>Phone Number: '.$C[$i]['Telefono'].'<br>Cell Phone Number:'.$C[$i]['Celular'].'<br>
                        Address: '.$C[$i]['direccion'].'</p>
                    </div>
                    <div class="panel-heading">Academic Background:</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['FormacionAc'].'</p>
                    </div>
                    <div class="panel-heading">Work Experience</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['Experiencia'].'</p>
                        </div>
                    <div class="panel-heading">References</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['Referencia1'].' : '.$C[$i]['TelRef1'].'<br>
                            '.$C[$i]['Referencia2'].' : '.$C[$i]['TelRef2'].'<br>
                            '.$C[$i]['Referencia3'].' : '.$C[$i]['TelRef3'].'<br></p>
                </div>';
        }
        return $c;
    }
    
    public function mostrarCurriculum(){
        $sql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        
        $id = $sesion->obtenerVariableSesion('idUsuario');
        $query = 'SELECT Nombre_Completo,Telefono,Celular,direccion,FormacionAc,Experiencia,Referencia1,TelRef1,Referencia2,TelRef2,Referencia3,TelRef3,idCuenta_Cuenta FROM curriculum WHERE idCuenta_cuenta='.$id;
        $result = $sql->consulta($query);
        
        $variables['curriculum'] = $this->convertirCurHTML($result);
        
        $plantilla->verPagina('curriculum',$variables);
    }
    
    public function verCurriculumA($id){
        $sql = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        
        $query = 'SELECT Nombre_Completo,Telefono,Celular,direccion,FormacionAc,Experiencia,Referencia1,TelRef1,Referencia2,TelRef2,Referencia3,TelRef3,idCuenta_Cuenta FROM curriculum WHERE idCuenta_cuenta='.$id;
        $result = $sql->consulta($query);
        
        $variables['curriculumV'] = $this->convertirCurAmigoHTML($result);
        
        $plantilla->verPagina('curriculumV',$variables);
    }
        public function convertirCurAmigoHTML($C = array()){
        
        $c = '';
        
        for ($i = 0; $i < count($C); $i++){
            $c.='<div class="panel panel-default">
                  <div class="panel-heading">'.$C[$i]['Nombre_Completo'].'</div>
                    <div class="panel-body">
                        <p>Phone Number: '.$C[$i]['Telefono'].'<br>Cell Phone Number:'.$C[$i]['Celular'].'<br>
                        Address: '.$C[$i]['direccion'].'</p>
                    </div>
                    <div class="panel-heading">Academic Background:</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['FormacionAc'].'</p>
                    </div>
                    <div class="panel-heading">Work Experience</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['Experiencia'].'</p>
                        </div>
                    <div class="panel-heading">References</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['Referencia1'].' : '.$C[$i]['TelRef1'].'<br>
                            '.$C[$i]['Referencia2'].' : '.$C[$i]['TelRef2'].'<br>
                            '.$C[$i]['Referencia3'].' : '.$C[$i]['TelRef3'].'<br></p>
                </div>';
        }
        return $c;
    }
}