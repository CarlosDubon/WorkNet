<a href='./perfil_Mostrar.php' class='list-group-item active'> Profile<br>    </a>
<a href="./mensajes.php" class="list-group-item"><span class="fui-chat"></span> Friends</a>
<a href="#" class="list-group-item"><span class="fui-video"></span> Video Calls</a>
<a href="../vistas/calendarioEmpresa.php" class="list-group-item"><span class="fui-calendar-solid"></span> Events</a>
<a href="" class="list-group-item" data-toggle="modal" data-target="#myModal"><span class="fui-calendar-solid"></span> Create Event</a>
<a href="./logout.php" class="list-group-item"><span class="fui-power"></span> Log out</a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning!</h4>
      </div>
      <div class="modal-body">
        You just can send a request of events to your manage.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a type="button" href="../controladores/formEventos.php" class="btn btn-primary">Accept</a>
      </div>
    </div>
  </div>
</div>