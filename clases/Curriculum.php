<?php
require_once realpath(dirname(__FILE__) . '/./Utilidades.php');
require_once realpath(dirname(__FILE__) . '/./MySQL.php');
require_once realpath(dirname(__FILE__) . '/./Plantilla.php');

class Curriculum {
    public function mostrarFormulario(){
        $plantilla = new Plantilla();
        $sesion= new Sesion();
        $db = new MySQL();
        $utilidades = new Utilidades();

            $id = $sesion->obtenerVariableSesion('idUsuario');
        $query = 'SELECT State_Curriculum FROM cuenta WHERE idCuenta='.$id;
        $result = $db->consulta($query);
        $check = $result[0]['State_Curriculum'];
        
        if($check == 0)
            $plantilla->verPagina('fromCurriculum');
        else{
            $utilidades->Redireccionar('controladores/formCurriculumEdit.php');
        }
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
            $table = 'cuenta';
            $change = 'State_Curriculum = 1';
            $donde = 'idCuenta ='.$id;
            $resultado = modificarRegistro($table,$change,$donde);
            
            $utilidades->mostrarMensaje("El curriculum se creo exitosamente");
            $utilidades->Redireccionar('controladores/formCurriculum.php');
        }
        else{
            $utilidades->mostrarMensaje("Lo sentimos!, Ocurrio un error, por favor intente de nuevo");
            $utilidades->Redireccionar('controladores/formCurriculum.php');
        }

    }

    public function convertirCurHTML($C = array()){

        $c = '';

        for ($i = 0; $i < count($C); $i++){
            $c.='<div class="panel panel-default">
                  <div class="panel-heading">'.$C[$i]['Nombre_Completo'].'</div>
                    <div class="panel-body">
                        <p>Numero Telefonico: '.$C[$i]['Telefono'].'<br>Celular:'.$C[$i]['Celular'].'<br>
                        Direccion: '.$C[$i]['direccion'].'</p>
                    </div>
                    <div class="panel-heading">Experiencia Academica:</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['FormacionAc'].'</p>
                    </div>
                    <div class="panel-heading">Experiencia Laboral</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['Experiencia'].'</p>
                        </div>
                    <div class="panel-heading">Referencias</div>
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
                        <p>Numero Telefonico: '.$C[$i]['Telefono'].'<br>Celular:'.$C[$i]['Celular'].'<br>
                        Direccion: '.$C[$i]['direccion'].'</p>
                    </div>
                    <div class="panel-heading">Experiencia Academica:</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['FormacionAc'].'</p>
                    </div>
                    <div class="panel-heading">Experiencia Laboral</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['Experiencia'].'</p>
                        </div>
                    <div class="panel-heading">Referencias</div>
                        <div class="panel-body">
                            <p>'.$C[$i]['Referencia1'].' : '.$C[$i]['TelRef1'].'<br>
                            '.$C[$i]['Referencia2'].' : '.$C[$i]['TelRef2'].'<br>
                            '.$C[$i]['Referencia3'].' : '.$C[$i]['TelRef3'].'<br></p>
                </div>';
        }
        return $c;
    }
    
        public function mostrarFormularioEdit(){
            $plantilla = new Plantilla();
            $db = new MySQL();
            $sesion = new Sesion();
            
            $id = $sesion->obtenerVariableSesion('idUsuario');
            $query = 'SELECT Nombre_Completo,Telefono,Celular,direccion,FormacionAc,Experiencia,Referencia1,TelRef1,Referencia2,TelRef2,Referencia3,TelRef3,idCuenta_Cuenta FROM curriculum WHERE idCuenta_cuenta='.$id;
            $result = $db->consulta($query);
            
            $variables['Nombre']=$result[0]['Nombre_Completo'];
            $variables['Telefono']=$result[0]['Telefono'];
            $variables['Celular']=$result[0]['Celular'];
            $variables['Direccion']=$result[0]['direccion'];
            $variables['Academica']=$result[0]['FormacionAc'];
            $variables['Laboral']=$result[0]['Experiencia'];
            $variables['R1']=$result[0]['Referencia1'];
            $variables['T1']=$result[0]['TelRef1'];
            $variables['R2']=$result[0]['Referencia2'];
            $variables['T2']=$result[0]['TelRef2'];
            $variables['R3']=$result[0]['Referencia3'];
            $variables['T3']=$result[0]['TelRef3'];
            
            $plantilla -> verPagina('formCurriculumEdit', $variables);
        }
    public function editarCurriculum($datos){
        $db = new MySQL();
        $sesion = new Sesion();
        $plantilla = new Plantilla();
        $utilidades = new Utilidades();

       
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

         $tabla = 'curriculum';
         $cambio = "Nombre_Completo ='".$nombre."',
                  Telefono='".$tel."',
                  Celular='".$cel."',
                  direccion='".$dic."',
                  FormacionAc='".$academica."',
                  Experiencia = '".$ex."',
                  Referencia1 = '".$ref1."',
                  TelRef1 = '".$tel1."',
                  Referencia2 = '".$ref2."',
                  TelRef2 = '".$tel2."',
                  Referencia3 = '".$ref3."',
                  TelRef3 = '".$tel3."'";
        $where ='idCuenta_cuenta='.$id;


        $result = $db->modificarRegistro($tabla, $cambio, $where);
        
        if($result){
            $utilidades->mostrarMensaje('El curriculum se edito correctamente');
            $utilidades->Redireccionar('controladores/verCurriculum.php');
        }else{
             $utilidades->mostrarMensaje('Ocurrio un problema, por favor intente de nuevo');
            $utilidades->Redireccionar('controladores/publicar.php');
        }
            

    }
}

