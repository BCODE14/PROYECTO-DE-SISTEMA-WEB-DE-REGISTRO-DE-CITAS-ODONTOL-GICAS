
<?php

require_once("layouts/cabeza.php");
?>
<div class="img_principal">
    <div class="caja_datos_hijo_2">
    <img src="vista/layouts/img_pro/logo.png" alt="">
        <h2>Registro</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="from_r">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label><br>
                <input type="text" class="input_i_s_2" name="username" class="form-control" value="<?php echo $username; ?>"><br>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password"class="input_i_s_2" name="password" class="form-control" value="<?php echo $password; ?>"><br>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" class="input_i_s_2" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"><br>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="caja"  >
                <input type="submit"  class="btn_ingresos_2" class="btn btn-primary" value="Ingresar">
                <input type="reset"   class="btn_ingresos_2" class="btn btn-default" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="index.php" class="btn_regis">Ingresa aquí</a></p>
        </form>
    </div>    
    </div>
<?php

    require_once("layouts/footer.php");
?>
    