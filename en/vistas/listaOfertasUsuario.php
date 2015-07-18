<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><p class="text-center">Offers</p></h3>
    </div>
    <div class="panel-body">
      {{listaOfertasUsuario}}
    </div>
</div>
<div class="modal fade" id="app" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning</h4>
      </div>
    <form action="./guardarAplicador.php" method="POST">
      <div class="modal-body">
        Are you sure you want to apply to this offer?
          <span class="help-block">This action can't be reverted!</span>
          <input type="hidden" value="{{idOferta}}" name="idOferta">
          <input type="hidden" value="{{idEmpresa}}" name="idEmpresa">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Apply">
      </div>
    </form>
    </div>
  </div>
</div>
