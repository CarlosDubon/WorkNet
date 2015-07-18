<link href="recursos/css/chat.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="fui-chat div-blanco"></span> Chat
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span>Menu</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="actualizaChat({{miamigo}});return false;" ><span class="fui-info-circle">
                            </span>Update</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chatpanel-body" id="chatpanel">
                    <ul class="chat">
                        {{chatearUsuarios}}
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <form action="../controladores/guardarMensajeChat.php" method="POST">
                        <!--<input type="text" name="mensaje" class="form-control" placeholder="Escribe tu mensaje aqui...">-->
                            <input type="hidden" name="idAmigo" class="form-control" value="{{miamigo}}">
                                <!--<span class="input-group-btn">
                                <button class="btn btn-success" type="submit"><span class="fui-arrow-right"></span></button>
                                </span>
                            -->
                                                        <!---<span class="input-group-btn">
                                                        <button class="btn btn-default" type="submit">Enviar</button>
                                                    </span>--->
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="mensaje" class="form-control" placeholder="Write your message...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type=""><span class="fui-arrow-right"></span></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.setInterval("actualizaChat({{miamigo}})",5000);

    function actualizaChat(idAmigo) {
        var parametros = {
            "idCuenta": idAmigo
        };
        $.ajax({
            data: parametros,
            url: './chatear.php',
            type: 'post',
            beforeSend: function() {
                $("#chatpanel").html("Procesando, espere por favor...");
            },
            success: function(response) {
                $("#chatpanel").html(response);
            }
        });
    }
</script>
