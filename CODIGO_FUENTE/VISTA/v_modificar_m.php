

<script type='text/javascript'> 

   
function modulo_medicos(){

    document.getElementById('m_citas').style.backgroundColor='white';
    document.getElementById('m_medicos').style.backgroundColor="#5cc9d0";
    document.getElementById('m_horarios').style.backgroundColor='white';

}



</script>


<?php

require_once("layouts/header.php");


?>

<script type='text/javascript'>

modulo_medicos();


</script>


<!--modal nueva cita-->

<!--<div class="cont_modal">-->
        <div class="cont_citas">

        <a class="btn_volver" href="comprobador.php?m=mostrar_m">volver</a>

           <!-- <span class="btn_close"><--</span>-->
            <div class="datos_cita">
            <p class="titulo_modulo">Modificar Medico</p>
                <form action="" method="get" class="from_cont"    enctype="multipart/form-data" >
                

                <p class="titulo">Datos de Medico</p>
               
                <?php
    foreach($dato as $v){
        
        ?>

                <input type="hidden" name="id" value="<?php echo $v['id_medico'] ?>">

                <select class="sele_servicio" name="especialidad[]" >
                    <option value="<?php echo $v['especialidad'] ?>" selected><?php echo $v['especialidad'] ?></option>
                    <option value="odontologia" >odontologia</option>
                    <option value="ortodoncia">ortodoncia</option>
                    <option value="protesis dental">protesis dental</option>

                </select>
                <input type="text" class="sele_servicio" name="codigo" value="<?php echo $v['cod_medico'] ?>">
                <input type="text" class="sele_servicio" name="nombre" value="<?php echo $v['nombre_m'] ?>" pattern="[A-Za-z\s.]+">
                <input type="text" class="sele_servicio" name="apellidos" value="<?php echo $v['apellido'] ?>" pattern="[A-Za-z\s.]+">
                <input type="text" class="sele_servicio" name="dni" value="<?php echo $v['dni'] ?>" pattern="[0-9]{8}">
                <input type="number" class="sele_servicio" name="edad" id="edad" value="<?php echo $v['edad'] ?>" 
                 min="1" max="100">
                <input type="tel" class="sele_servicio" name="telefono" value="<?php echo $v['telefono'] ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{3}">
                <input type="email" class="sele_servicio" name="correo" value="<?php echo $v['email'] ?>" >
                
                <input  class="sele_servicio" type="date" id="start" name="fecha"
                value="<?php echo $v['fecha'] ?>"
                            min="2022-01-01" max="2024-12-31">


                <!--<label class="sele_servicio" >Foto</label>-->
                
                <!--<input type="file"   name="imagen" value="" />-->
            
                <input type="hidden" name="mm" value="actualizar_m">
                <input type="submit" class="btn_guardar" name="btn" value="Guardar">
                
                <?php
       
    };
?>

                </form>
                
                </div>  

        </div>


<?php

require_once("layouts/footer.php");

?>