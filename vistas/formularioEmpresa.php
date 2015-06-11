<!DOCTYPE>
<html>
    <head>
        <title>Sing Up</title>
        <meta charset="utf-8">
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">
        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
    </head>
    <body class="fondi">
        <div class="login-form">
            <center><h3>Sign Up</h3></center>                   
            <form action="../controladores/guardarEmpresa.php" method="POST">
                <div class='form-group'>     
                    <label for="Empresa">Company:</label><br>
                    <input type='text' class='form-control login-field' id="letras" onkeydown="return validarLetras(event)" name='empresa' placeholder='Company' required /><br>
                    </div>
                    <div class='form-group'> 
                    <label for="Usuario">User:</label><br>
                    <input type='text' class='form-control login-field' name='user' placeholder='User' required /><br>
                    </div>
                    <div class='form-group'> 
                    <label for="Contraseña">Password:</label><br>
                    <input type='password' minlength="5" id="pass" class='form-control login-field' name='password' placeholder='Password' required  /><br>
                    <label for="Repita Contraseña">Confirm Password:</label><br>
                    <input type='password' id="repass" class='form-control login-field' name='repassword' placeholder='Confirm Password' required  /><br>
                    <div id="val"></div>
                    </div>
                    <label for="Nombre">Name:</label><br>
                    <input type='text' class='form-control login-field' id="letras" onkeydown="return validarLetras(event)" name='name' placeholder='Name'  required /><br>
                    <label for="Apellido">Surname:</label><br>
                    <input type='text' class='form-control login-field' id="letras" onkeydown="return validarLetras(event)" name='ape' placeholder='Surname' required /><br>
                    <label for="DUI">DUI:</label><br>
                    <input type='text' maxlength="10"id="num" onkeydown="return validarNumeros(event)" class='form-control login-field' name='dui' placeholder='DUI' required /><br>
                    <label for="FechaNacimiento"> Fundation Date (month/day/year):</label><br>
                    <input type='date' class='form-control login-field' name='birth' placeholder='Fundation Date' required /><br>
                    <label for="email">E-mail:</label><br>
                    <div class='form-group'> 
                    <input type='email' id="email" class='form-control login-field' name='email' placeholder='E-mail' required /><br>
                    <label for="email2">Confirm e-mail:</label><br>
                    <input type='email' id="remail" class='form-control login-field' name='remail' placeholder='Confirm e-mail' required  /><br>
                    <div id="val2"></div>
                    </div>
                    <label for="web">Web Site(optional):</label><br>
                    <input type='url' class='form-control login-field' name='site' placeholder='Web Site' /><br>
                    <label for="Dirección">Address:</label><br>
                    <input type='text' class='form-control login-field' name='adres' placeholder='Address' required  /><br>
                    <label for="Telefono">Phone Number:</label><br>
                    <input type='tel' maxlength="9" id="num" onkeydown="return validarNumeros(event)" class='form-control login-field' name='phone' placeholder='Phone Number'required  /><br>
                    <p class="text-center">
                    <input type='submit' value='Sing up' class='btn btn-primary btn-lg btn-warning'>
                    <a href='../controladores/index.php'><input type='button' value='Back' class='btn btn-primary btn-lg btn-danger'></a>
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
<script type="text/javascript">
  function validarLetras(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; // backspace
		if (tecla==32) return true; // espacio
		if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
		if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
 
		patron = /[a-zA-Z]/; //patron
 
		te = String.fromCharCode(tecla); 
		return patron.test(te); // prueba de patron
	}	
</script>
