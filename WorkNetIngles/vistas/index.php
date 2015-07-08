<!DOCTYPE>
<html>
    <head>
        <title>Sign In</title>
        <meta charset="utf-8">
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">
        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
    </head>
    <body class="fondi">
        <form action="../controladores/index.php" method="POST">

            <div class="login-form">                
                <center><h1>WorkNet</h1></center>
                <p font-size="14pt">WorkNet, a social network for enterprises, employers and employees.</p>          

                <div class="form-group">

                    <input type="text" class="form-control login-field" name="user" placeholder="User" id="login-name" />
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control login-field" name="pass" placeholder="Password" id="login-pass" />
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>
                <div id="divcen">
                    <center>
                        <input class="btn btn-primary btn-lg btn-danger" type="submit" value="Sign In">
                        </div>
                <a class="login-link" href="php/olvido.php">Forgot your Password?</a>

                </div><br>
                <div class="login-form">
                    <h4><center>Sign Up as:</center></h4>
                    <div class="form-group">
                        <center>
                            <a class="btn btn-primary btn-lg btn-warning" href="formNuevaEmpresa.php">Enterprise</a>   
                            <a class="btn btn-primary btn-lg btn-info" href="formCrearUsuario.php">User</a>   
                        </center>
                    </div>  
                </div>
        </form>
    </body>
</html>
<script src="../vistas/recursos/js/jquery.min.js"></script>
<script src="../vistas/recursos/js/flat-ui.min.js"></script>