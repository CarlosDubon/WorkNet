        <div id="panel">
            
            <div class="list-group">
              <a class="list-group-item active">
                Tools
              </a>
              <a data-toggle="modal" data-target="#myModal" data-toggle="modal" data-target="#myModal" class="list-group-item"><span class="fui-user"></span> Users
              </a>
              <a href="crearcat.php" class="list-group-item"><span class="fui-list-thumbnailed"></span> Create Categories
              </a>
              <a href="vercat.php" class="list-group-item"><span class="fui-list-thumbnailed"></span> Categories

              </a>
                <a href="./verDenuncias.php" class="list-group-item"><span class="fui-cross"></span> Denounces
              </a>
              <a href="./tiposReporte.php" class="list-group-item"><span class="fui-document"></span> Reports
              </a>
              <a href="logout.php" class="list-group-item"><span class="fui-power"></span> Log Out
              </a>
            </div>
        </div>
   
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">WorkNet</h4>
      </div>
      <div class="modal-body">
        Users:
      </div>
      <div class="modal-footer">
        <a href="./usuarios_admin.php" class="btn btn-default">All</a>
        <a href="./usuariosEmpresarios_admin.php" class="btn btn-primary">Enterpises</a>
        <a   href="./usuariosUsuarios_admin.php" class="btn btn-primary">Users</a>

      </div>
    </div>
  </div>
</div>