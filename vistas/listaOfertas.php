<div class="panel panel-primary">    
    <div class="panel-heading">        
        <h3 class="panel-title"><p class="text-center">Ofertas</p></h3>        
    </div>
    <div class="panel-body">
      {{listaOfertas}}
    </div>
</div>


<div class="modal fade" id="Verapp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Personas Intereasadas en la Oferta</h4>
      </div>
      <div class="modal-body">
          {{listaInterasdos}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>