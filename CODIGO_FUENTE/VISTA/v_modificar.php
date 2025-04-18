<?php

        require_once("layouts/header.php");
        

        ?>
        
     <!--modal nueva cita-->


                <div class="cont_citas">
                <a class="btn_volver" href="comprobador.php?m=inicio">volver</a>
                    
                    <div class="datos_cita">

                    <p class="titulo_modulo">modificar cita</p>
                        <form action="" method="GET" class="from_cont">
                        

                        <p class="titulo">Datos de  Cita</p>
                        <?php
                            $usuario = 'clin';
                            $password = '1234';
                            $db = new PDO('mysql:host=localhost;dbname=clinica', $usuario, $password);
                        ?>
                         <?php
    foreach($dato as $v){
        
        ?>
                        <select class="sele_servicio" name="servicio[]" >
                        <option value="" >Seleccionar Servicio</option>
                            <option value="<?php echo $v['id_servicio'] ?>" selected><?php echo $v['nombre_s'] ?></option>
                            <?php
                            $query = $db->prepare("SELECT * FROM servicios");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores):
                            echo '<option value="'.$valores["id_servicio"].'">'.$valores["nombre_s"].' </option>';
                            endforeach;
                            ?>
                            <!--<option value="cita" >cita</option>
                            <option value="ortodoncia" >ortodoncia</option>
                            <option value="extracion dental" >extracion dental</option>
                            <option value="protesis dental" >protesis dental</option>
                            <option value="limpiesa dental" >limpiesa dental</option>-->
                        </select>

                        <input  class="sele_servicio" type="date" id="start" name="fecha"
                            value="<?php echo $v['fecha'] ?>"
                            min="2022-01-01" max="2024-12-31">

                            <input type="time" class="sele_servicio" name="hora" Value="<?php echo $v['hora'] ?>">

                        <select class="sele_servicio" name="estado[]" >
                            <option value="<?php echo $v['estado_cita'] ?>" selected><?php echo $v['estado_cita'] ?></option>
                            <option value="pendiente" >pendiente</option>
                            <option value="completado">completado</option>
                            <option value="cancelado">cancelado</option>

                        </select>

                        <select class="sele_servicio" name="pago[]" >
                            <option value="<?php echo $v['estado_pago'] ?>" selected><?php echo $v['estado_pago'] ?></option>
                            <option value="pendiente" >pendiente</option>
                            <option value="efectivo">efectivo</option>
                            <option value="tarjeta">tarjeta</option>

                        </select>

                        <p class="titulo">Datos del Cliente</p>

                        <input type="text" class="sele_servicio" name="nombre"  Value="<?php echo $v['nombre'] ?>" pattern="[A-Za-z\s.]+">
                        <input type="text" class="sele_servicio" name="apellidos"  Value="<?php echo $v['apellido'] ?>" pattern="[A-Za-z\s.]+">
                        <input type="text" class="sele_servicio" name="dni" Value=<?php echo $v['dni'] ?> pattern="[0-9]{8}">
                        <input type="number" id="edad" class="sele_servicio" name="edad" Value="<?php echo $v['edad'] ?>"
                         min="1" max="100">
                        <input type="tel" class="sele_servicio" name="telefono" Value="<?php echo $v['telefono'] ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                        <input type="email" class="sele_servicio" name="correo" Value="<?php echo $v['email'] ?>" >
                        
                        <!--    <input type="radio" name="genero[]" value="male" checked> Hombre<br>
                            <input type="radio" name="genero[]" value="female"> Mujer<br>
                            <input type="radio" name="genero[]" value="other"> Otro <br>
                        -->
                        <p  class="titulo">Datos Medico</p>

                        <?php
                            $usuario = 'clin';
                            $password = '1234';
                            $db = new PDO('mysql:host=localhost;dbname=clinica', $usuario, $password);
                        ?>

                        <select class="sele_servicio" name="medico[]" >
                            <option value="<?php echo $v['id_medico'] ?>" selected><?php echo $v['nombre_m'] ?></option>
                            <?php
                            $query = $db->prepare("SELECT * FROM medico");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores):
                            echo '<option value="'.$valores["id_medico"].'">'.$valores["nombre_m"].' '.$valores["apellido"].'</option>';
                            endforeach;
                            ?>
                        <!--    <option value="value2" >dr.carolina delgado</option>
                            <option value="value3">dr.clara velarde</option>
                            <option value="value3">dr.marlen dias</option>-->
                        </select>
 
                       
                        <!--<div class="btn_guardar">Guardar</div>-->
                        <input type="hidden" value="<?php echo $v['id_paciente'] ?>" name="id"> <br>
                        
                        <input type="hidden" name="m" value="actualizar">
                        <input type="hidden" value="<?php echo $v['id_cita'] ?>" name="id_ci"> <br>
                        <input type="submit" class="btn_guardar" name="btn" value="actualizar">
                        <?php
       
                        };
    ?>

                        </form>
                        
                        </div>  

                </div>

       

           <!-- <div class="modal_horario">


                          
            </div>-->









        <?php
        
        require_once("layouts/footer.php");
        
        ?>