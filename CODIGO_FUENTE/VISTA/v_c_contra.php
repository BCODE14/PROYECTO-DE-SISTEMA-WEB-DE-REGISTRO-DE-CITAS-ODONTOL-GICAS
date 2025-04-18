
<?php

require_once("layouts/cabeza.php");
?>
<div class="img_principal">
        <div class="caja_datos_hijo">
        <span class="foto_u" >
                        
                    </span>
                <h2>Cambia tu contraseña </h2>
            
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="from_r"> 
                    <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                        <label>Nueva contraseña</label>
                        <input type="password"class="input_i_s" name="new_password" class="form-control" value="<?php echo $new_password; ?>"><br>
                        <span class="help-block"><?php echo $new_password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Confirmar contraseña</label>
                        <input type="password" class="input_i_s" name="confirm_password" class="form-control"><br>
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn_ingresos_hijo_1"  class="btn btn-primary" value="Enviar">
                        <a class="btn btn-link btn_regis"  href=" comprobador.php"   >Cancelar</a>
                    </div>
                </form>
            </div>  

            </div> 



