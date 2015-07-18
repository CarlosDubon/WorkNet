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
              <div class="row">
                <div class="col-lg-6">
                  <div class='form-group'>
                      <label for="Empieza">Start Date:</label><br>
                          <input type='date' class='form-control login-field' name='empieza' placeholder='Start Date' required /><br>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class='form-group'>
                      <label for="Empieza">Start Hour:</label><br>
                          <input type='time' class='form-control login-field' name='HInicio' placeholder='Start Hour' required /><br>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <label for="Termina">End Date:</label><br>
                          <input type='date' class='form-control login-field' name='termina' placeholder='End Date' required /><br>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <label for="Termina">End Hour:</label><br>
                          <input type='time' class='form-control login-field' name='HTermina' placeholder='End Hour' required /><br>
                  </div>
                </div>
              </div>
                      <label for="Nombre">Event Name:</label><br>
                          <input type='text' class='form-control login-field' name='nombre' placeholder='Event Name' required  /><br>
                      <label for="Descripcion">Event Description:</label><br>
                      <textarea class='form-control login-field' id="publicacion"  name='descripcion' placeholder='Event Description' required  /></textarea><br>
                      <p class="text-center">
                      <input type='submit' value='Save' class='btn btn-primary btn-lg btn-warning'>
                      <a href='#'><input type='button' value='Back' class='btn btn-primary btn-lg btn-danger'></a>
                      </p>
                  </div>
            </form>
        </div>
        <script src="../vistas/recursos/js/jquery.min.js"></script>
        <script src="../vistas/recursos/js/flat-ui.min.js"></script>
