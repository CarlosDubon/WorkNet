
<div class="panel panel-primary" id="portafoliod">
  <div class="panel-heading">
    <h3 class="panel-title">Portafolio</h3>
  </div>
  <div class="panel-body">
      {{listaArchivos}}

      <div class="login-form" id="portafolio">

          <form action="../controladores/subirArchivo.php" method="POST" enctype="multipart/form-data">
              <h5><center>Subir archivo</center></h5>
              <br>
                  <center><input type="file" name="file" class="btn btn-info"></center>
              <br>
                  <center><input type="submit" value="Actualizar" class="btn btn-warning"></center>

          </form>

      </div>
  </div>
</div>
 <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {

        $('#miTabla').DataTable();
    });
</script>
