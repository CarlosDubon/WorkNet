<!DOCTYPE>
<html>
    <head>
        <title>Events</title>
        <meta charset="utf-8">
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">
        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">    
    </head>
    <body>
        <div id="eventoform" class="login-form">
            <center><h3>Events</h3></center>                   
            <form action="../controladores/guardarEventoTrabajador.php" method="POST">
                <div class='form-group'>     
                    <label for="Empieza">Inicio:</label><br>
                        <input type='date' class='form-control login-field' name='empieza' placeholder='Inicio' required /><br>
                    <label for="Termina">Termina:</label><br>
                        <input type='date' class='form-control login-field' name='termina' placeholder='Termina' required /><br>
                    <label for="Nombre">Titulo:</label><br>
                        <input type='text' class='form-control login-field' name='nombre' placeholder='Titulo' required  /><br>
                    <label for="Descripcion">Description:</label><br>
                    <input type='text' class='form-control login-field' name='descripcion' placeholder='Description' required  /><br>
                    <p class="text-center">
                    <input type='submit' value='Guardar' class='btn btn-primary btn-lg btn-warning'>
                    <a href='#'><input type='button' value='Cancel' class='btn btn-primary btn-lg btn-danger'></a>
                    </p>
                </div>
            </form>            
        </div>
        <script src="../vistas/recursos/js/jquery.min.js"></script>    
        <script src="../vistas/recursos/js/flat-ui.min.js"></script>    

