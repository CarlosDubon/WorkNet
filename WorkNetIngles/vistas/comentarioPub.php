<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Publication</h3>
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
                <input class="btn btn-default" value="Comment" id="publicacionbtn" type="submit" >
            </span>
        </div>
    </form>
</div>
    {{comentarios}}
</div>
