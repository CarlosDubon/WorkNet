<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Publicacion</h3>
  </div>
  <div class="panel-body">
      {{publicacion}}
  </div>
<div class="well">
    <form action="./guardarComentario.php" method="POST">
         <div class="input-group">
            <input type="hidden" name="id" value="{{Id}}">
            <textarea type="text" name="comentario" class="form-control" id="publicacion" required></textarea>
            <span class="input-group-btn">
                <input class="btn btn-default" value="Comentar" id="publicacionbtn" type="submit" >
            </span>
        </div>  
    </form>
        {{comentarios}}

</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
      </div>
      <div class="modal-body">
        ¿Está seguro que quiere eliminar la publicación seleccionada?
          <span class="help-block">La siguiente acción no se podra revertir</span>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <a href="./eliminarPub.php?idPub={{Id}}" class="btn btn-primary">Aceptar</a>
      </div>
    </div>
  </div>
</div>