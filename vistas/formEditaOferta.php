<div class="panel panel-primary" id="ofer">
    <div class="panel-heading">        
        <h3 class="panel-title"><p class="text-center">Editar Oferta de trabajo</p></h3>        
    </div>
    <div class="panel-body">
        <form action="../controladores/guardarOfertas.php" method="POST">    
            <div class="form-group">
                <label for="Titulo">Titulo:</label>
                <input type="text" class="form-control login-field" name="titulo" placeholder="Titulo" required />

                <label for="Requisitos">Detalle:</label>
                <input type="text" class="form-control login-field" name="detalle" placeholder="Detalle" required />
                <!-- <textarea class="form-control login-field" name="requisitos" placeholder="Requisitos" required /></textarea><br> -->
                <label for="Info">Cargo:</label>
                <input type="text" class="form-control login-field" name="cargo" placeholder="Cargo" required />
                <label for="Info">Edad:</label>
                <input type="text" id="edad" class="form-control login-field" name="edad" placeholder="Edad" required />
                <label for="Info">Requiriemtos:</label>
                <input type="text"  class="form-control login-field" name="requisitos" placeholder="Requerimientos" required /><br>
                <input type="submit" value="Crear" class="btn btn-primary btn-lg btn-warning">                
                <a href="./publicar.php" class="btn btn-danger">Cancelar</a>
                </p>
            </div>    
        </form>
    </div>
</div>