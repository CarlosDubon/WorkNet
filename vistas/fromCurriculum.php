<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Crear Curriculum</h3>
  </div>
 <form method="POST" action="../controladores/guardarCurriculum.php">
    <div class="panel-body">
        <label>Nombre Completo</label>
        <input type="text" class="form-control" name="name" placeholder="Full Name" Required>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Telefono</label>
                <input type="tel" name="tel" class="form-control" placeholder="Phone Number">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Celular</label>
                <input type="tel" name="cel" class="form-control" placeholder="Cellphone Number">
            </div>
        </div>
    </div>
    <div class="panel-body">
        <label>Dirección</label>
        <input type="text" class="form-control" name="dic" placeholder="Address" required>
    </div>
    <div class="panel-body">
        <label>Formacion Academica</label>
        <textarea class="form-control" id="fa" name="academica" placeholder="Academic Background" required></textarea>
    </div>
    <div class="panel-body">
        <label>Experiencia Academica</label>
        <textarea class="form-control" id="fa" name="ex" placeholder="Work Experience" required></textarea>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Referencia</label>
                <input type="tel" name="ref1" class="form-control" placeholder="Reference">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Celular</label>
                <input type="tel" name="tel1" class="form-control" placeholder="Phone Number">
            </div>
        </div>
    </div>     
    <div class="row">
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Referencia</label>
                <input type="tel" name="ref2" class="form-control" placeholder="Reference">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Celular</label>
                <input type="tel" name="tel2" class="form-control" placeholder="Phone Number">
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Referencia</label>
                <input type="tel" name="ref3" class="form-control" placeholder="Reference">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-body">
                <label>Celular</label>
                <input type="tel" name="tel3" class="form-control" placeholder="Phone Number">
            </div>
        </div>
    </div>
        <center>
        <a class="btn btn-default" href="../controladores/publicar.php"> Cancel</a>
        <input type="submit" class="btn btn-success">
        </center><br>
    </form>

</div> 