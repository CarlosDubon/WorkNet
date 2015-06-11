<!DOCTYPE>
<html>
    <head>
        <title>Eventos</title>
        <meta charset="utf-8">
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">
        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">    
    </head>
    <body>
        <div id="eventoform" class="login-form">
            <center><h3>Event</h3></center>                   
            <form action="../controladores/guardarEvento.php" method="POST">
                <div class='form-group'>     
                    <label for="Empieza">Starts:</label><br>
                        <input type='date' class='form-control login-field' name='empieza' placeholder='Starts' required /><br>
                    <label for="Termina">Ends:</label><br>
                        <input type='date' class='form-control login-field' name='termina' placeholder='Ends' required /><br>
                    <label for="Nombre">Event Name:</label><br>
                        <input type='text' class='form-control login-field' name='nombre' placeholder='Event Name' required  /><br>
                    <label for="Descripcion">Event Description:</label><br>
                    <input type='text' class='form-control login-field' name='descripcion' placeholder='Event Description' required  /><br>
                    <p class="text-center">
                    <input type='submit' value='Save' class='btn btn-primary btn-lg btn-warning'>
                    <a href='#'><input type='button' value='Back' class='btn btn-primary btn-lg btn-danger'></a>
                    </p>
                </div>
            </form>            
        </div>
        <script src="../vistas/recursos/js/jquery.min.js"></script>    
        <script src="../vistas/recursos/js/flat-ui.min.js"></script>    

