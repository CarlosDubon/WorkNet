<!DOCTYPE>
<html>
    <head>
        <title>Registrar</title>
        <meta charset="utf-8">
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">
        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">    
        <link href="../style.css" rel="stylesheet">    
    </head>
    <body>
        <form action="../controladores/cambiarContraEmpre.php" method="POST">
            <div class="login-form" id="cat">
                <div class="from-group">
                    <center><h3>Cambiar contraseña</h3></center>
                    <div class="form-group">
                        <label>Contraseña actual:</label>
                        <input type="password" minlegth="5" class="form-control login-field" placeholder="Contraseña actual" name="oldpass" required>
                    </div>
                    <div class="form-group">
                        <label>Nueva contraseña</label>
                        <input type="password" minlength="5" id="pass" class="form-control login-field" placeholder="Nueva contraseña" name="newpass" required><br><br>
                        <input type="password" minlength="5" id="repass" class="form-control login-field" placeholder="Repita nueva contraseña" name="newrepass" required><br><br>
                        <div id="val"></div>
                    </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                   
                </div>
            </div>   
        </form>   
    </body>
    <script src="../vistas/recursos/js/jquery.min.js"></script>    
    <script src="../vistas/recursos/js/flat-ui.min.js"></script>  
</html>

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