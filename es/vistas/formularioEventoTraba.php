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
            <center><h3>Eventos</h3></center>
            <form action="../controladores/guardarEventoTrabajador.php" method="POST">
              <div class="row">
                <div class="col-lg-6">
                  <div class='form-group'>
                      <label for="Empieza">Fecha Incio:</label><br>
                          <input type='date' class='form-control login-field' name='empieza' placeholder='Inicio' required /><br>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class='form-group'>
                      <label for="Empieza">Hora Incio:</label><br>
                          <input type='time' class='form-control login-field' name='HInicio' placeholder='Inicio' required /><br>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <label for="Termina">Fecha Finaliza:</label><br>
                          <input type='date' class='form-control login-field' name='termina' placeholder='Finaliza' required /><br>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <label for="Termina">Hora Finaliza:</label><br>
                          <input type='time' class='form-control login-field' name='HTermina' placeholder='Finaliza' required /><br>
                  </div>
                </div>
              </div>
                      <label for="Nombre">Nombre del evento:</label><br>
                          <input type='text' class='form-control login-field' name='nombre' placeholder='Nombre del evento' required  /><br>
                      <label for="Descripcion">Descripción del evento:</label><br>
                      <textarea class='form-control login-field' id="publicacion"  name='descripcion' placeholder='Descripción del evento' required  /></textarea><br>
                      <p class="text-center">
                      <input type='submit' value='Guardar' class='btn btn-primary btn-lg btn-warning'>
                      <a href='#'><input type='button' value='Regresar' class='btn btn-primary btn-lg btn-danger'></a>
                      </p>
                  </div>
            </form>
        </div>
        <script src="../vistas/recursos/js/jquery.min.js"></script>
        <script src="../vistas/recursos/js/flat-ui.min.js"></script>
