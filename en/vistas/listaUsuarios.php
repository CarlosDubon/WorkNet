<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><p class="text-center">Users</p></h3>
    </div>
    <div class="panel-body">
      {{listaUsuarios}}
    </div>
</div>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#miTabla').DataTable();
    });
</script>
<script>
  function confirmarAccion(){
    var agree=confirm("¿Esta seguro de continuar con esta acción?");
    if(agree)
      return true;
    else {
      return false;
    }
  }
</script>

</script>
<div class="modal fade" id="activarUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aviso!</h4>
      </div>
      <div class="modal-body">
        Esta seguro que quiere activar el usuario seleccionado?
          <span class="help-block">Esta acción puede revertirse desactivando el usuario</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="./activarUsuario.php?idCuenta={{id}}" class="btn btn-primary">Aceptar</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="descativarUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aviso!</h4>
      </div>
      <div class="modal-body">
        Esta seguro que quiere desactivar el usuario seleccionado?
          <span class="help-block">Esta acción puede revertirse activando el usuario</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="./desactivarUsuario.php?idCuenta={{id}}" class="btn btn-primary">Aceptar</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="recoverPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aviso!</h4>
      </div>
      <div class="modal-body">
        Esta seguro que desea reiniciar la contraseña a "WorkNet2015"?
          <span class="help-block">Si acepta realizar esta acción no se podra revertir </span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="./recuperarClave.php?idCuenta={{id}}" class="btn btn-primary">Aceptar</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aviso!</h4>
      </div>
      <div class="modal-body">
        Esta seguro que desea eliminar el usuario seleccionado?
          <span class="help-block">Si se realiza esta acción no habra registros del usuario que se eliminara</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="./eliminarUsuario.php?idCuenta={{id}}" class="btn btn-primary">Aceptar</a>
      </div>
    </div>
  </div>
</div>
