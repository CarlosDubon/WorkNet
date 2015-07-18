<!DOCTYPE>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8">
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">
        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
    </head>
    <body class="fondi">
        <div class="login-form" id="registro">
            <center><h3>Sign Up</h3></center>
            <form action="../controladores/guardarEmpresa.php" method="POST">
            <div class="row">
                <div class="col-lg-6">
                <div class='form-group'>
                    <label for="Empresa">Enterprise:</label><br>
                    <input type='text' class='form-control login-field' id="letras" onkeydown="return validarLetras(event)" name='empresa' placeholder='Enterprise' required /><br>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class='form-group'>
                    <label for="Usuario">User:</label><br>
                    <input type='text' class='form-control login-field' name='user' maxlength="10" placeholder='User' required /><br>
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                    <div class='form-group'>
                    <label for="Contraseña">Password:</label><br>
                    <input type='password' minlength="5" id="pass" class='form-control login-field' name='password' placeholder='Password' required  /><br>
                    <label for="Confirm Password">Confirm Password:</label><br>
                    <input type='password' id="repass" class='form-control login-field' name='repassword' placeholder='Confirm Password' required  /><br>
                    </div>
                    <div id="val"></div>
                    </div>
                    <div class="col-lg-6">
                    <label for="Nombre">Name:</label><br>
                    <input type='text' class='form-control login-field' onkeypress="return numeros(event)" id="letras" name='name' placeholder='Name'  required /><br>
                    <label for="Apellido">Surname:</label><br>
                    <input type='text' class='form-control login-field' id="letras" onkeypress="return numeros(event)" name='ape' placeholder='Surname' required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <label for="DUI">DUI:</label><br>
                    <input type='text' onkeyup="mascara(this,'-',patron2,true)" maxlength="10"id="num" onkeydown="return validarNumeros(event)" class='form-control login-field' name='dui' placeholder='DUI' required /><br>
                    </div>
                    <div class="col-lg-6">
                    <label for="FechaNacimiento"> Fundation Date (month/day/year):</label><br>
                    <input type='date' class='form-control login-field' name='birth' placeholder='Fundation Date' required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <label for="email">E-mail:</label><br>
                    <div class='form-group'>
                    <input type='email' id="email" class='form-control login-field' name='email' placeholder='E-mail' required /><br>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <label for="web">Web Site(optional):</label><br>
                    <input type='url' class='form-control login-field' name='site' placeholder='Web Site' /><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <label for="Dirección">Address:</label><br>
                    <input type='text' class='form-control login-field' name='adres' placeholder='Address' required  /><br>
                    </div>
                    <div class="col-lg-6">
                    <label for="Telefono">Phone Number:</label><br>
                    <input type='tel' maxlength="9" id="num" onkeydown="return validarNumeros(event)" class='form-control login-field' name='phone' placeholder='Phone Number' onkeyup="mascara(this,'-',patron3,true)" required  /><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="control-label">Category</label><br>
                    <select class="form-control" id="select" name="categoria" required>
                    <option value="">Select a Category</option>
                        {{opciones}}
                    </select>
                </div>
                    <p class="text-center">
                    <input type='submit' value='Registrarse' class='btn btn-primary btn-lg btn-warning'>
                    <a href='../controladores/index.php'><input type='button' value='Regresar' class='btn btn-primary btn-lg btn-danger'></a>
                    </p>
                </div>
            </form>
        </div>
        <script src="../vistas/recursos/js/jquery.min.js"></script>
        <script src="../vistas/recursos/js/flat-ui.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#pass,#repass").keyup(function(){
            var pass=$("#pass").val();
            var repass=$("#repass").val();

                if(pass != repass){
                    $("#val").parent().addClass("has-error");
                    $("#val").parent().removeClass("has-success");
                }else if(pass == "" || repass == ""){
                    $("#val").parent().removeClass("has-success has-error");
                    $("#val").text("");
                }else{
                    $("#val").parent().addClass("has-success");
                    $("#val").parent().removeClass("has-error");

                }
        });
        $("#mail,#remail").keyup(function(){
            var email=$("#email").val();
            var remail=$("#remail").val();

                if(email != remail){
                    $("#val2").parent().addClass("has-error");
                    $("#val2").parent().removeClass("has-success");
                }else if(email == "" || remail == ""){
                    $("#val2").parent().removeClass("has-success has-error");
                    $("#val2").text("");
                }else{
                    $("#val2").parent().addClass("has-success");
                    $("#val2").parent().removeClass("has-error");

                }
        });
    });

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

<script>
    var patron3 = new Array(4,4);
    var patron2 = new Array(8,1);
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
<script>
    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
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
