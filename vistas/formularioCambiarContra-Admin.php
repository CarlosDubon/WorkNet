
        
            <div class="login-form" id="cambiarcontra">
                <form action="../controladores/cambiarContraAdmin.php" method="POST">
                <div class="from-group">
                    <center><h3>Cambiar contraseña</h3></center>
                    <div class="form-group">
                        <label>Contraseña actual:</label>
                        <input type="password" minlength="5"  class="form-control login-field" placeholder="Contraseña actual" name="oldpass" required>
                        <label>Nueva contraseña:</label>
                        <input type="password" minlength="5"  class="form-control login-field" placeholder="Nueva contraseña" name="newpass" required><br>
                        <input type="password" minlength="5"  class="form-control login-field" placeholder="Repita nueva contraseña" name="newrepass" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success"  value="Guardar">
                    </div>
                   
                </div>
                </form>   
            </div>   
      
   