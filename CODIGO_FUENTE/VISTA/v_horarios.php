


<script type='text/javascript'> 

function modulo_horarios(){
    document.getElementById('m_citas').style.backgroundColor='white';
    document.getElementById('m_medicos').style.backgroundColor="white";
    document.getElementById('m_horarios').style.backgroundColor='#5cc9d0';
}

</script>



<?php

require_once("layouts/header.php");

?>
<script type='text/javascript' >

modulo_horarios();

</script>

<div class="cont_citas_2_1">

<p class="barra_cont" >Horarios</p>
<p class="titu">Ingrese los Datos del Horario</p>

    <form class="conte_from_1" method="GET"  >
    <?php
                            $usuario = 'clin';
                            $password = '1234';
                            $db = new PDO('mysql:host=localhost;dbname=clinica', $usuario, $password);
                        ?>
                  
                        <input type="date" class="sele_servicio"  name="dia" placeholder="Dia" required> 
                        <input type="time" class="sele_servicio" name="h_inicio" placeholder="Hora inicio" required> 
                        <input type="time" class="sele_servicio" name="h_final" placeholder="Hora final" required> 
                       
                        
                        <select class="sele_servicio" name="medico[]" >
                            <option value="value1" selected>Selecionar Medico</option>
                            <?php
                            $query = $db->prepare("SELECT * FROM medico");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores):
                            echo '<option value="'.$valores["id_medico"].'">'.$valores["nombre_m"].' '.$valores["apellido"].'</option>';
                            endforeach;
                            ?>
                    
                        </select>

                        <select class="sele_servicio" name="turno[]" >
                            <option value="value1" selected>Seleccionar turno</option>
                            <option value="T">T</option>
                            <option value="M">M</option>
                            
                        </select> 

                        <select class="sele_servicio" name="estado[]" >
                            <option value="value1" selected>Seleccionar estado</option>
                            <option value="disponible" >disponible</option>
                            <option value="no disponible">no disponible</option>
                            
                        </select> 

                        <select class="sele_servicio" name="dias[]" >
                            <option value="value1" selected>Seleccionar dia</option>
                            <option value="L" >L</option>
                            <option value="M" >M</option>
                            <option value="MI">MI</option>
                            <option value="J" >J</option>
                            <option value="V" >V</option>
                            <option value="S" >S</option>
                            
                        </select> 
                 
                        <input type="hidden" name="mh" value="guardar_h">
                        <input type="submit" class="btn_guardar_2_h" name="btn" value="Guardar">           
    </form>
      
    
    </div>



    <div class="cont_citas_2">

        <p class="barra_cont" >Servicios</p>
        <p class="titu" >Ingrese los Datos de los Servicio</p>

        <form class="conte_from_2" method="GET" >

            <input type="text" name="nom_servicio" class="sele_servicio" placeholder="Nombre del servicio" required>
            <input type="text" name="duc_servicio" class="sele_servicio" placeholder="Duracion del servicio" required>
            <input type="text" name="precio_serv" class="sele_servicio" placeholder="Precio del servicio" required>

            <input type="hidden" name="mh" value="guardar_s">
            <input type="submit" class="btn_guardar_2_h" name="btn" value="Guardar">

        </form>

    </div>
    
<?php

require_once("layouts/footer.php");

?>

