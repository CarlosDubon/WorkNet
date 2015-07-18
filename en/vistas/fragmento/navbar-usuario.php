<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <!-- <img src="img/logo/logito.png"> -->
            <a class="navbar-brand" href="#">WorkNet</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" onkeyup="getStates(this.value)">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="fui-search"></span></button>
                </form>
                <li class="active"><a href="#"></a></li>
                <li><a href="../controladores/publicar.php"><span class="fui-home"></span> Home</a></li>
                <li><a href="./verPerfilUsuario.php"><span class="fui-user"></span>Profile</a></li>
                <li> <a href="./verNotificaciones.php"><span class="fa fa-globe"></span> Notifications </a></li>
    
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="fui-gear"></span> Account<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><span class="help-block" id="mover"><i class="fa fa-search"></i> Search Friends</span></li>
                        <li class="divider"></li>

                        <li><a href="../controladores/buscarempresas.php"><i class="fa fa-building-o"></i> Enterprises</a></li>
                        <li><a href="./buscarusuarios.php "><i class="fa fa-users"></i> Users</a></li>



                        <li class="divider"></li>
                        <li><a href="../controladores/crearformCambiarcontra-Usuario.php"><span class="fui-gear"></span> Change Password</a></li>
                        <li><a href="logout.php"><span class="fui-power"></span> Log Out</a></li>

                    </ul>
            </ul>
        </div>
    </div>
</div>
<div class="well search"><div id="results"></div></div>

<script type="text/javascript">

    function getStates(value){
         var results=$("#results")

        $.post("../controladores/slideBar.php", {partialState:value}, function(data) {
            $("#results").html(data);
        });
    }
</script>

<script type="text/javascript">
    $(".search").fadeOut();
    function getStates(value){
         var results=$("#results")
         if (value == "") {
            $(".search").fadeOut();
         }else {
        $.post("../controladores/slideBar.php", {partialState:value}, function(data) {
          $(".search").fadeIn();
            $("#results").html(data);


        });
      }
    }
</script>
