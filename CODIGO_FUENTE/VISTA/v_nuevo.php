        <?php

        require_once("layouts/header.php");
        

        ?>
        
     <!--modal nueva cita-->

     <!--<div class="cont_modal">-->
                <div class="cont_citas">

                <a class="btn_volver" href="comprobador.php?m=inicio">volver</a>

                   <!-- <span class="btn_close"><--</span>-->
                    <div class="datos_cita">
                    <p class="titulo_modulo">NUEVA CITA</p>
                        <form action="" method="GET" class="from_cont">
                        

                        <p class="titulo">Datos de  Cita</p>
                        <?php
                            $usuario = 'clin';
                            $password = '1234';
                            $db = new PDO('mysql:host=localhost;dbname=clinica', $usuario, $password);
                        ?>
                        <select class="sele_servicio" name="servicio[]" required>
                            <option value="seleccionar servicio" selected>Seleccionar Servicio</option>
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
                            value="2022-11-23"
                            min="2022-01-01" max="2024-12-31" required>

                            <input type="time" class="sele_servicio" name="hora" required>

                        <select class="sele_servicio" name="estado[]" required>
                            <option value="value1" selected>Seleccionar Estado</option>
                            <option value="pendiente" >pendiente</option>
                            <option value="completado">completado</option>
                            <option value="cancelado">cancelado</option>

                        </select>

                        <select class="sele_servicio" name="pago[]" required>
                            <option value="value1" selected>Seleccionar pago</option>
                            <option value="pendiente" >pendiente</option>
                            <option value="efectivo">efectivo</option>
                            <option value="tarjeta">tarjeta</option>

                        </select>

                        <p class="titulo">Datos del Cliente</p>

                        <input type="text" class="sele_servicio" name="nombre" placeholder="Nombre" pattern="[A-Za-z\s.]+" required>
                        <input type="text" class="sele_servicio" name="apellidos" placeholder="Apellidos" pattern="[A-Za-z\s.]+" required>
                        <input type="text" class="sele_servicio" name="dni" placeholder="Dni" pattern="[0-9]{8}" required>
                        <input type="number" class="sele_servicio" id="edad" name="edad" placeholder="edad"
                         min="1" max="100">
                        <input type="tel" class="sele_servicio" name="telefono" placeholder="Telefono" pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                        <input type="email" class="sele_servicio" name="correo" placeholder="correo" >
                        
                        <!--    <input type="radio" name="genero[]" value="male" checked> Hombre<br>
                            <input type="radio" name="genero[]" value="female"> Mujer<br>
                            <input type="radio" name="genero[]" value="other"> Otro <br>
                        -->
                        <p class="titulo">Datos Medico</p>

                        <?php
                            $usuario = 'clin';
                            $password = '1234';
                            $db = new PDO('mysql:host=localhost;dbname=clinica', $usuario, $password);
                        ?>

                        <select class="sele_servicio" name="medico[]" required>
                            <option value="value1" selected>Selecionar Medico</option>
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
 
                        <a href="comprobador.php?mh=visu_h" class="btn_h_visu">visualizar Horario</a>

                        <!--<div class="btn_guardar">Guardar</div>-->
                        <input type="hidden" name="m" value="guardar">
                        <input type="submit" class="btn_guardar" name="btn" value="Guardar">
                        

                        </form>
                        
                        </div>  

                </div>

            <!--</div>-->

           <!-- <div class="modal_horario">


                          
            </div>-->









        <?php
        
        require_once("layouts/footer.php");
        
        ?>