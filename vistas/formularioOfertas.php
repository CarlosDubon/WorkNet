<div class="panel panel-primary" id="ofer">
    <div class="panel-heading">        
        <h3 class="panel-title"><p class="text-center">New employment offer</p></h3>        
    </div>
    <div class="panel-body">
        <form action="../controladores/guardarOfertas.php" method="POST">    
            <div class="form-group">
                <label for="Titulo">Offer Title:</label>
                <input type="text" class="form-control login-field" name="titulo" placeholder="Offer Title" required />

                <label for="Requisitos">Detail:</label>
                <input type="text" class="form-control login-field" name="detalle" placeholder="Detail" required />
                <!-- <textarea class="form-control login-field" name="requisitos" placeholder="Requisitos" required /></textarea><br> -->
                <label for="Info">Position:</label>
                <input type="text" class="form-control login-field" name="cargo" placeholder="Position" required />
                <label for="Info">Age:</label>
                <input type="text" id="edad" class="form-control login-field" name="edad" placeholder="Age" required />
                <label for="Info">Requirements:</label>
                <input type="text"  class="form-control login-field" name="requisitos" placeholder="Requirements" required /><br>
                <input type="submit" value="Create" class="btn btn-primary btn-lg btn-warning">                
                <a href="./noticias.php" class="btn btn-danger">Cancel</a>
                </p>
            </div>    
        </form>
    </div>
</div>