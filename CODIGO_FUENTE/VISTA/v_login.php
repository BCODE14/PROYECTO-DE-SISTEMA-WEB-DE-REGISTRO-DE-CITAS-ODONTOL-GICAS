
<?php

    require_once("layouts/cabeza.php");
?>

<div class="img_principal">

        <div class="caja_datos_hijo">
        <img src="vista/layouts/img_pro/logo.png" alt="">
            <h2>LOGIN</h2>
           
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="from_r">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Usuario</label>
                    <input type="text" class="input_i_s" name="username" class="form-control" value="<?php echo $username; ?>">
                    <br>
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Contraseña</label>
                    <input type="password" class="input_i_s"  name="password" class="form-control">
                    <br>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn_ingresos_hijo_1" class="btn btn-primary"  value="Ingresar">
                </div>
                <p>¿No tienes una cuenta? <a class="btn_regis" href="registrar.php">         Regístrate ahora</a></p>
            </form>
        </div>    
    
</div>
    

<?php

    require_once("layouts/footer.php");
?>