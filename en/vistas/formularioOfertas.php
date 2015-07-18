<div class="panel panel-primary" id="ofer">
    <div class="panel-heading">
        <h3 class="panel-title"><p class="text-center">New Eployment Offer</p></h3>
    </div>
    <div class="panel-body">
        <form action="../controladores/guardarOfertas.php" method="POST">
            <div class="form-group">
                <label for="Titulo">Title:</label>
                <input type="text" class="form-control login-field" name="titulo" placeholder="Title" required />

                <label for="Requisitos">Datail:</label>
                <textarea type="text" id="publicacion" class="form-control login-field" name="detalle" placeholder="Datail" required></textarea>
                <label for="Info">Charge:</label>
                <input type="text" class="form-control login-field" name="cargo" placeholder="Charge" required />
                <label for="Info">Age:</label>
                <input type="text" id="edad" onkeydown="return validarNumeros(event)" class="form-control login-field" name="edad" placeholder="Age" maxlength="2" required />
                <label for="Genero">Gender:</label>
                <select name="genero" class="form-control" id="select">
                    <option value="M">Masculine</option>
                    <option value="F">Feminine</option>
                    <option value="A">Both</option>
                </select>
                <label for="salario">Salary</label>
                <div class="input-group">
                    <span class="input-group-addon ">$</span>
                    <input type="text" class="form-control" name="salario" onkeypress="mascara(this,'.',patSalario,true)" minlength="5" required>
                </div>
                <span class="help-block">Salary per hour</span>
                <label for="direccion">Address</label>
                <textarea type="text" id="publicacion" class="form-control login-field" name="adress" placeholder="Address" required></textarea>
                <label for="Info">Requirements:</label>
                <input type="text"  class="form-control login-field" name="requisitos" placeholder="Requirements" required /><br>
                <input type="submit" value="Create" class="btn btn-primary btn-lg btn-warning">
                <a href="./publicar.php" class="btn btn-danger">Cancel</a>
                </p>
            </div>
        </form>
    </div>
</div>
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
<script>
    var patSalario = new Array(2,1);
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
