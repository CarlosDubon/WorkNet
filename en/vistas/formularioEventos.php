<!DOCTYPE>
<html>
    <head>
        <title>Events</title>
        <meta charset="utf-8">
        <link href="../vistas/recursos/css/bootstrap.css" rel="stylesheet">
        <link href="../vistas/recursos/css/flat-ui.css" rel="stylesheet">
    </head>
    <body>
        <div id="eventoform" class="login-form">
            <center><h3>Events</h3></center>
            <form action="../controladores/guardarEvento.php" method="POST">
              <div class="row">
                <div class="col-lg-6">
                  <div class='form-group'>
                      <label for="Empieza">Start Date:</label><br>
                          <input type='date' class='form-control login-field' maxlength="10" minlength="10" onkeyup="mascara(this,'/',fecha,true)" name='empieza' placeholder='Start' required /><br>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class='form-group'>
                      <label for="Empieza">Start Hour:</label><br>
                          <input type='time' class='form-control login-field'maxlength="10" minlength="10" onkeyup="mascara(this,':',hora,true)" name='HInicio' placeholder='Start' required /><br>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <label for="Termina">End Date</label><br>
                          <input type='date' class='form-control login-field' maxlength="10" minlength="10" onkeyup="mascara(this,'/',fecha,true)" name='termina' placeholder='End Date' required /><br>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <label for="Termina">End Hour:</label><br>
                          <input type='time' class='form-control login-field' maxlength="10" minlength="10" onkeyup="mascara(this,':',hora,true)" name='HTermina' placeholder='End Hour' required /><br>
                  </div>
                </div>
              </div>
                      <label for="Nombre">Event Name:</label><br>
                          <input type='text' class='form-control login-field' name='nombre' placeholder='Event Name' required  /><br>
                      <label for="Descripcion">Event Description:</label><br>
                      <textarea class='form-control login-field' id="publicacion"  name='descripcion' placeholder='Event Description' required  /></textarea><br>
                      <p class="text-center">
                      <input type='submit' value='Save' class='btn btn-primary btn-lg btn-warning'>
                      <a href='#'><input type='button' value='Back' class='btn btn-primary btn-lg btn-danger'></a>
                      </p>
                  </div>
            </form>
        </div>
        <script src="../vistas/recursos/js/jquery.min.js"></script>
        <script src="../vistas/recursos/js/flat-ui.min.js"></script>

<script>
    var fecha = new Array(2,2,4);
    var hora = new Array(2,2);
        function mascara(d,sep,pat,nums){
            if(d.valant != d.value){
                val = d.value
                largo = val.length
                val = val.split(sep)
                val2 = ''
                for(r=0;r<val.length;r++){
                    val2 += val[r]
                }
                if(nums){
                    for(z=0;z<val2.length;z++){
                        if(isNaN(val2.charAt(z))){
                            letra = new RegExp(val2.charAt(z),"g")
                            val2 = val2.replace(letra,"")
                        }
                    }
                }
                val = ''
                val3 = new Array()
                for(s=0; s<pat.length; s++){
                    val3[s] = val2.substring(0,pat[s])
                    val2 = val2.substr(pat[s])
                }
                for(q=0;q<val3.length; q++){
                    if(q ==0){
                      val = val3[q]
                    }else{
                        if(val3[q] != ""){
                            val += sep + val3[q]
                        }
                    }
                }
                    d.value = val
                    d.valant = val
            }
}
</script>
