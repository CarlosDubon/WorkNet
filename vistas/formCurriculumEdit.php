<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Crear Currículum</h3>
  </div>
 <form method="POST" action="../controladores/editarCurriculum.php">
    <div class="panel-body">
        <label>Nombre Completo</label>
        <input type="text" class="form-control" name="name" onkeypress="return numeros(event)" value="{{Nombre}}" Required>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Número de Teléfono</label>
                <input type="tel" name="tel" onkeydown="mascara(this,'-',patronCel,true)" maxlength="9" class="form-control" value="{{Telefono}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Número de Celular</label>
                <input type="tel" name="cel" maxlength="9"  onkeydown="mascara(this,'-',patronCel,true)" class="form-control" value="{{Celular}}">
            </div>
        </div>
    </div>
    <div class="panel-body">
        <label>Dirección</label>
        <input type="text" class="form-control" name="dic" value="{{Direccion}}" required>
    </div>
    <div class="panel-body">
        <label>Formación Academica</label>
        <textarea class="form-control" id="fa" name="academica" required>{{Academica}}</textarea>
    </div>
    <div class="panel-body">
        <label>Experiencia laboral</label>
        <textarea class="form-control" id="fa" name="ex" required>{{Laboral}}</textarea>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Referencia</label>
                <input type="tel" name="ref1"  onkeypress="return numeros(event)" class="form-control" value="{{R1}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Número de Teléfono</label>
                <input type="tel" name="tel1" class="form-control"  onkeydown="mascara(this,'-',patronCel,true)"value="{{T1}}" maxlength="9">
            </div>
        </div>
    </div>     
    <div class="row">
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Referencia</label>
                <input type="tel" name="ref2" onkeypress="return numeros(event)" class="form-control" value="{{R2}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Número de Teléfono</label>
                <input type="tel" name="tel2" class="form-control"  onkeydown="mascara(this,'-',patronCel,true)" value="{{T2}}" maxlength="9">
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Referencia</label>
                <input type="tel" name="ref3" onkeypress="return numeros(event)" class="form-control" value="{{R3}}" >
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Número de Teléfono</label>
                <input type="tel" name="tel3" class="form-control"  onkeydown="mascara(this,'-',patronCel,true)"  value="{{T3}}" maxlength="9">
            </div>
        </div>
    </div>
        <center>
        <a class="btn btn-default" href="../controladores/publicar.php"> Cancel</a>
        <input type="submit" class="btn btn-success">
        </center><br>
    </form>
</div> 
<script>
    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZñÑ";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
</script>
<script>
    var patronCel = new Array(4,4);
        function mascara(d,sep,pat,nums){
            if(d.valant != d.value){
                val = d.value
                largo = val.length
                val = val.split(sep)
                val2 = ''
                for(r=0;r<val.length;r++){
                    val2 += val[r]	
                }
                if(nums){
                    for(z=0;z<val2.length;z++){
                        if(isNaN(val2.charAt(z))){
                            letra = new RegExp(val2.charAt(z),"g")
                            val2 = val2.replace(letra,"")
                        }
                    }
                }
                val = ''
                val3 = new Array()
                for(s=0; s<pat.length; s++){
                    val3[s] = val2.substring(0,pat[s])
                    val2 = val2.substr(pat[s])
                }
                for(q=0;q<val3.length; q++){
                    if(q ==0){
                      val = val3[q]
                    }else{
                        if(val3[q] != ""){
                            val += sep + val3[q]
                        }
                    }
                }
                    d.value = val
                    d.valant = val
            }
}
</script>

    <script type="text/javascript">
	function validarNumeros(e) { // 1
		tecla = (document.all) ? e.keyCode : e.which; // 2
		if (tecla==8) return true; // backspace
		if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
		if (tecla==189) return true; // guion
		if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
		if (tecla>=96 && tecla<=105) { return true;} //numpad
 
		patron = /[0-9]/; // patron
 
		te = String.fromCharCode(tecla); 
		return patron.test(te); // prueba
	}
</script>