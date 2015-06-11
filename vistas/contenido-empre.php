     
<div class="panel panel-warning" id="newsfeed2">
  <div class="panel-heading">
    <h3 class="panel-title">News</h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
        <form action="../controladores/guardarPub.php" method="POST">
                <div class="form-group">
                  <label class="control-label">Write Something</label>
                  <div class="input-group">
                    <input type="text" name="texto" class="form-control" id="publicacion">
                    <span class="input-group-btn">
                      <input class="btn btn-default" value="Share" id="publicacionbtn" type="submit">
                    </span>
                  </div>
                </div>        
        </form>
        {{publicaciones}} 
  </div>
</div>
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comentarios</h4>
      </div>
      <div class="modal-body">
          {{comentarios}}
      </div>
            <form action="../controladores/guardarComentario.php" method="POST">
        <div class="modal-footer">
        <div class="form-group">
          <label class="control-label" id="iz">Comentario</label>
          <input class="form-control input-lg" type="text" name="comentario" id="inputLarge">
        </div>
        <input type="submit" class="btn btn-primary" value="Comentar">
      </div>
        </form>

    </div>
  </div>
</div>
            
    