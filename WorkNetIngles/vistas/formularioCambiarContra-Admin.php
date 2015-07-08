        
<div class="login-form" id="cambiarcontra">
                <form action="../controladores/cambiarContraAdmin.php" method="POST">
                <div class="from-group">
                    <center><h3>Modify Password</h3></center>
                    <div class="form-group">
                        <label>Current Password:</label>
                        <input type="password" minlength="5"  class="form-control login-field" placeholder="Current Password" name="oldpass" required>
                        <label>New Password:</label>
                        <input type="password" minlength="5"  class="form-control login-field" placeholder="New Password" name="newpass" required><br>
                        <input type="password" minlength="5"  class="form-control login-field" placeholder="Confirm New Password" name="newrepass" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success"  value="Modify">
                    </div>
                   
                </div>
                </form>   
            </div>   
      
   