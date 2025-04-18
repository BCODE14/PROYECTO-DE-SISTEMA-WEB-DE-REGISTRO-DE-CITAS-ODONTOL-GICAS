

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

<div class="modulo_citas">

<p class="barra_cont" >medicos</p>


    <!--<div class="btn_nueva_cita">+ nueva cita</div>-->
    <div class="modulo_citas_nuevo">
    <a href="comprobador.php? m=nuevo_m" class="btn_nueva_cita">+ Nuevo medico</a>
    </div>
   

<table class="tabla_cont">
    <tr class="tabla_cabeza">
        <td>NRO</td>
        <td>FOTO</td>
        <td>CODIGO</td>  
        <td>NOMBRE</td> 
        <td>DNI</td> 
        <td>EDAD</td> 
        <td>TELEFONO</td>
        <td>ESPECIALIDAD</td> 
        <td>ACCIONES</td> 
        
    </tr>
    <tbody  class="tabla_cuerpo">
        <?php
            $i=1;
            if(!empty($dato)):
                //var_dump($dato);
                
                foreach($dato as $v){
                 ?>
                    <tr>
                        <td><?php echo $i;?> </td>
                        <td><?php echo $v['cod_medico'] ;?> </td>
     
                        <td><img src="data:image/jpg;base64,<?php echo base64_encode($v['foto']) ; ?> " width = "100px" height = "150px" "/> </td>
                        <td><?php echo $v['nombre_m'].$v['apellido']; ?> </td>
                        <td><?php echo $v['dni'] ?> </td>
                        <td><?php echo $v['edad'] ?> </td>
                        <td><?php echo $v['telefono'] ?> </td>
                        <td><?php echo $v['especialidad'] ?> </td>
                        
                        <td>
                            <a class="btn-c" href="comprobador.php?mm=editar_m&dni=<?php echo $v['dni']?>">EDITAR</a>
                            <a class="btn-c" href="comprobador.php?mm=eliminar_m&id=<?php echo $v['id_medico']?>" onclick="return confirm('Esta Seguro de eliminar al medico'); false">ELIMINAR</a>
                        </td>
                    </tr>
                    <?php $i++;} ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">NO HAY CITAS</td>
                </tr>
            <?php endif ?>
    </tbody>
</table>

   

</div>


<?php

require_once("layouts/footer.php");

?>


