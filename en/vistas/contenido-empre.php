     
<div class="panel panel-warning" id="newsfeed2">
  <div class="panel-heading">
    <h3 class="panel-title">News Feed</h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
        <form action="../controladores/guardarPub.php" method="POST">
                <div class="form-group">
                  <label class="control-label">Write Something</label>
                  <div class="input-group">
                      <textarea type="text" name="texto" class="form-control" id="publicacion" required></textarea>
                    <span class="input-group-btn">
                      <input class="btn btn-default" value="Share" id="publicacionbtn" type="submit" >
                    </span>
                  </div>
                </div>  </form>
        {{publicaciones}}
  </di>
</div>

   
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Denounce</h4>
      </div>
        <form action="./denunciar.php" method="POST">
      <div class="modal-body">
          <h6>Please write the reason of the denounce</h6><input type="hidden" name="id" value="{{id}}">
           <div class="form-group">
                <div class="col-lg-10">
                    <textarea required class="form-control" name="razon" rows="3" id="publicacion" id="textArea"></textarea>
                </div>
    </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Denounce">
    </form>
      </div>
    </div>
  </div>
</div>
            
    