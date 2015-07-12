<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
            </button>
<!--            <img id="logito" src="../recursos/logo/Logo3.jpg">-->
            <a class="navbar-brand" href="#">WorkNet</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Busqueda de usuarios"  onkeyup="getStates(this.value)">

                    </div>
                    <button type="submit" class="btn btn-default"><span class="fui-search"></span></button>
                </form>
                <li class="active"><a href="#"></a></li>
                <li><a href="../controladores/publicar.php"><span class="fui-home"></span> Inicio</a></li>                
                <li><a href="./perfil_Mostrar.php"><span class="fui-user"></span>Perfil</a></li>
                    
                <li> <a href="./verNotificaciones.php"><span class="fa fa-globe"></span> Notificaciones </a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="fui-gear"></span> Cuenta<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><span class="help-block" id="mover"><i class="fa fa-search"></i> Buscar amigos</span></li>
                        <li class="divider"></li>
                        <li><a href="../controladores/buscarempresas.php"><i class="fa fa-building-o"></i> Empresas</a></li>
                        <li><a href="../controladores/buscarusuarios.php "><i class="fa fa-users"></i> Usuarios</a></li>
                        <li class="divider"></li>
                        <li><a href="../controladores/crearformCambiarcontra-Empre.php"><span class="fui-gear"></span> Cambiar Contraseña</a></li>
                        <li><a href="logout.php"><span class="fui-power"></span> Cerrar sesión</a></li>

                    </ul>
                </li>
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
<script>
    function esconderDiv(){
        var eldiv =$("#results");
        if(eldiv.innerHTML == ""){
            eldiv.style.display = none;
        }
    }
</script>
  
    