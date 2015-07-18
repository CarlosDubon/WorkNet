<div class="login-form" id="perfil">
    <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
                  <div class="col-xs-3 col-md-12">
                   <!-- <img src="{{photo}}" id="backimg" >-->
                      <center><a href="" class="thumbnail" id="photot" data-toggle="modal" data-target="#myModal">
                          <img src="{{photo}}" alt="User Avatar" class="img-circle" id="foto-perfil">
                        </a></center>
                </div>
          </div>

    </div>
        </div>

        <div class="panel panel-default">
            <div class=" panel-heading">
                <a href="./agregarAmigo.php?idCuenta={{Id}}" class="btn btn-success" id="desactivar"><i class="fa fa-user-plus"></i> Follow User</a>
                <a href="./crearPortafolioV.php?cuenta_idCuenta={{Id}}" class="btn btn-warning" id="med"><i class="fa fa-suitcase"></i> Portfolio</a>
                <a href="#" class="btn btn-danger" id="de"  data-toggle="modal" data-target="#denuncia"><i class="fui-cross"></i> Denounce</a>

            </div>
    </div>

    <div class="panel panel-default">
            <div class=" panel-heading">
               <b>General Info</b>
            </div>
    </div>
        <div class="panel panel-default" id="az">
          <div class="panel-body">
            <b>User:</b> {{Usuario}}<br>
            <b>Enterprise:</b> {{Empresa}}<br>
            <b>Email:</b> {{Correo}}<br>
            <b>Fundation Date:</b> {{Fun}}<br>
            <b>Web Site:</b> {{Web}}<br>
            <b>Category:</b> {{Categoria}}
          </div>
    </div>
    <input type="hidden" value="{{Id}}">

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

<div class="modal fade" id="denuncia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Denounce</h4>
      </div>
        <form action="./denunciar.php" method="POST">
      <div class="modal-body">
          <h6>Please, write the reason of your denounce: </h6><input type="hidden" name="id" value="{{Id}}">
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
    <script>

$(document).ready(function(){
	$("#desactivar").change(function (){
	        var parametros = {"usuario" : $("#desactivar").val() };
	        $.ajax({
                	data:  parametros,
	                url:   'serv_usuario.php',
	                type:  'post',
	                success:  function (response) {
	                	if (response=="si") {
	                		$("#resusu").parent().addClass("has-error");
	                		$("#resusu").parent().removeClass("has-success");
	                	}else{
	                		$("#resusu").parent().addClass("has-success");
	                		$("#resusu").parent().removeClass("has-error");
	                	}

	                }
	        });
	});

	</script>
