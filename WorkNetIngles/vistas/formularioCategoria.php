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
        <form action="../controladores/guardarcategoria.php" method="POST">
            <div class="login-form" id="cat">
                <div class="from-group">
                    <center><h3>Create Category</h3></center>
                    <div class="form-group">
                        <label>Category:</label>
                        <input type="text" class="form-control login-field" placeholder="Category" name="cat" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" id="derecha" value="Save">
                    </div>
                   
                </div>
            </div>   
        </form>   
    </body>
    <script src="../vistas/recursos/js/jquery.min.js"></script>    
    <script src="../vistas/recursos/js/flat-ui.min.js"></script>    
</html>