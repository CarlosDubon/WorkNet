<div class="login-form" id="perfil">
    <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row"> 
                  <div class="col-xs-6 col-md-3">
                    
                       <a href="" class="thumbnail" id="photot" data-toggle="modal" data-target="#myModal">
                          <img src="{{photo}}" alt="Usuario Avatar" class="img-circle" id="foto-perfil">
                        </a>
                </div>
          </div>
          <div class="panel-body">
            <form action="./subirFoto.php"  method="POST" enctype="multipart/form-data">
            <input type="file" class="btn btn-info" name="file" id="btnfoto"><br>
            <button type="submit" class="btn btn-info" id="btnfile"><i class="fa fa-upload"></i></button>
            </form>
        </div>
    </div>
        </div>

    <div class="panel panel-default">
            <div class=" panel-heading">
                Información General
            </div>
    </div>
        <div class="panel panel-default" id="az">
          <div class="panel-body">
            <b>Usuario:</b> {{Usuario}} <br>
            <b>Empresa:</b> {{Empresa}}<br>
            <b>E-mail:</b> {{Correo}} <small id="de"><a href =""  data-toggle="modal" data-target="#ChangeE-mail">Editar<i class="fa fa-pencil"> </i></a></small><br>
            <b>Fecha de fundación:</b> {{Fun}}<br>
            <b>Web Site:</b> {{Web}} <small id="de"><a href ="">Editar<i class="fa fa-pencil"> </i></a></small><br>
          </div>
    </div>
    
        </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{Usuario}}</h4>
      </div>
      <div class="modal-body">
        <img src="{{photo}}" id="imgc">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ChangeE-mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cambiar Correo Electronico</h4>
      </div>
      <div class="modal-body">
        <form action="./cambiarContraseña.php" method="POST">
          <div class="form-group">
             <label class="control-label" for="disabledInput">Correo Anterior</label>
             <input class="form-control" id="disabledInput" value="{{Correo}}" type="text" placeholder="Disabled input here..." disabled="">
        </div>
          <div class="form-group">
              <label class="control-label" for="focusedInput">Nuevo Correo</label>
              <input class="form-control" name="newEmail" id="focusedInput" type="email" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar Cambios">
      </div>
    </div>
     </form>
  </div>
</div>

