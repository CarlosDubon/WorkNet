     
<div class="panel panel-warning" id="newsfeed2">
  <div class="panel-heading">
    <h3 class="panel-title">Noticias</h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
        <form action="../controladores/guardarPub.php" method="POST">
                <div class="form-group">
                  <label class="control-label">Escribe algo</label>
                  <div class="input-group">
                      <textarea type="text" name="texto" class="form-control" id="publicacion" required></textarea>
                    <span class="input-group-btn">
                      <input class="btn btn-default" value="Compartir" id="publicacionbtn" type="submit" >
                    </span>
                  </div>
                </div>        
        </form>
        {{publicaciones}} 
  </div>
</div>
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Denuncia</h4>
      </div>
      <div class="modal-body">
          <h6>Por favor escriba la razon de su denuncia</h6>
           <div class="form-group">
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="textArea"></textarea>
                </div>
    </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Denunciar</button>
      </div>
    </div>
  </div>
</div>
            
    