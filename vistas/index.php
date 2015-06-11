<!DOCTYPE>
<html>
    <head>
        <title>Inicia Sesión</title>
        <meta charset="utf-8">
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">
        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
    </head>
    <body class="fondi">
        <form action="../controladores/index.php" method="POST">

            <div class="login-form">                
                <center><h1>Worknet</h1></center>
                <p font-size="14pt">WorkNet, una red social para empresas, empresarios y trabajadores.</p>              

                <div class="form-group">

                    <input type="text" class="form-control login-field" name="user" placeholder="Usuario" id="login-name" />
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control login-field" name="pass" placeholder="Contraseña" id="login-pass" />
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>
                <div id="divcen">
                    <center>
                        <input class="btn btn-primary btn-lg btn-danger" type="submit" value="Inicia Sesión">
                        </div>
                <a class="login-link" href="php/olvido.php">¿Olvidaste tu contraseña?</a>

                </div><br>
                <div class="login-form">
                    <h4><center>Regístrate como:</center></h4>
                    <div class="form-group">
                        <center>
                            <a class="btn btn-primary btn-lg btn-warning" href="formNuevaEmpresa.php">Empresa</a>   
                            <a class="btn btn-primary btn-lg btn-info" href="formCrearUsuario.php">Usuario</a>   
                        </center>
                    </div>  
                </div>
        </form>
    </body>
</html>
<script src="../vistas/recursos/js/jquery.min.js"></script>
<script src="../vistas/recursos/js/flat-ui.min.js"></script>