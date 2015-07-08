     
<div class="panel panel-warning" id="newsfeed2">
  <div class="panel-heading">
    <h3 class="panel-title">News Feed</h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
        <form action="../controladores/guardarPub.php" method="POST">
                <div class="form-group">
                  <label class="control-label">Let's do some workneting...</label>
                  <div class="input-group">
                      <textarea type="text" name="texto" class="form-control" id="publicacion" required></textarea>
                    <span class="input-group-btn">
                      <input class="btn btn-default" value="Share" id="publicacionbtn" type="submit" >
                    </span>
                  </div>
                </div>        
        </form>
        {{publicaciones}} 
  </div>
</div>
    
            
    