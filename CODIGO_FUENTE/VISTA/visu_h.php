



<?php

require_once("layouts/header.php");

?>

<div class="conten_h">


<a class="btn_volver" href="comprobador.php?m=nuevo">volver</a>

<div class="modulo_citas">

<p class="barra_cont" >Horarios Actuales</p>



<form class="from_f" method="GET">

    <input type="date" class="sele_servicio"  name="fecha1"  value="2022-12-12" placeholder="Dia"> 
    <input type="date" class="sele_servicio"  name="fecha2"  value="2022-12-12" placeholder="Dia"> 
    <input type="hidden"  name="mh"  value="vi_h_e" > 
    <input type="submit" class="btn_guardar_f" name="btn"  value="Visualizar" > 

</form>


<div  class="tabla_cuerpo_h">

            <div class="item_h" >
            <div class="sub_item_her">HORAS</div>
            <?php
                foreach($dato as $v){
                    
                    if($v['dia'] == "L"){

                    
                    ?>
                                <div class="sub_item">
                                    <?php echo $v['hora_ingreso'] ;?> 
                                            
                                </div>
                                    
                                <div   class="sub_item">
                                    <?php  echo $v['hora_salida'] ;?> 
                                
                                </div>

                                <?php

                    }
                };
            ?>

            </div>

            <div class="item_1">
            <div class="sub_item_her">LUNES</div>

                <?php
                    foreach($dato as $v){
                        
                        if($v['dia'] == "L"){

                        
                        ?>
                                    <div class="sub_item">
                                        <?php echo $v['nombre_m']." ".$v['estado'];?> 
                                                
                                    </div>
                                        
                                    <div   class="sub_item">
                                        <?php  echo $v['nombre_m']." ".$v['estado'];?> 
                                    
                                    </div>

                                    <?php

                        }

                    };
                ?>

            </div>


            <div class="item_1">
            <div class="sub_item_her">MARTES</div>

            <?php
                foreach($dato as $v){
                    
                    if($v['dia'] == "M"){

                    
                    ?>
                                <div class="sub_item">
                                    <?php echo $v['nombre_m']." ".$v['estado'];?> 
                                            
                                </div>
                                    
                                <div   class="sub_item">
                                    <?php  echo $v['nombre_m']." ".$v['estado'];?> 
                                
                                </div>

                                <?php

                    }

                };
            ?>

            </div>

           


            <div class="item_1">
            <div class="sub_item_her">MIERCOLES</div>

            <?php
                foreach($dato as $v){
                    
                    if($v['dia'] == "MI"){

                    
                    ?>
                                <div class="sub_item">
                                    <?php echo $v['nombre_m']." ".$v['estado'];?> 
                                            
                                </div>
                                    
                                <div   class="sub_item">
                                    <?php  echo $v['nombre_m']." ".$v['estado'];?> 
                                
                                </div>

                                <?php

                    }

                };
            ?>

            </div>



            <div class="item_1">
            <div class="sub_item_her">JUEVES</div>

            <?php
                foreach($dato as $v){
                    
                    if($v['dia'] == "J"){

                    
                    ?>
                                <div class="sub_item">
                                    <?php echo $v['nombre_m']." ".$v['estado'];?> 
                                            
                                </div>
                                    
                                <div   class="sub_item">
                                    <?php  echo $v['nombre_m']." ".$v['estado'];?> 
                                
                                </div>

                                <?php

                    }

                };
            ?>

            </div>


            <div class="item_1">
            <div class="sub_item_her">VIERNES</div>

            <?php
                foreach($dato as $v){
                    
                    if($v['dia'] == "V"){

                    
                    ?>
                                <div class="sub_item">
                                    <?php echo $v['nombre_m']." ".$v['estado'];?> 
                                            
                                </div>
                                    
                                <div   class="sub_item">
                                    <?php  echo $v['nombre_m']." ".$v['estado'];?> 
                                
                                </div>

                                <?php

                    }

                };
            ?>

            </div>


            <div class="item_1">
            <div class="sub_item_her">SABADO</div>

            <?php
                foreach($dato as $v){
                    
                    if($v['dia'] == "S"){

                    
                    ?>
                                <div class="sub_item">
                                    <?php echo $v['nombre_m']." ".$v['estado'];?> 
                                            
                                </div>
                                    
                                <div   class="sub_item">
                                    <?php  echo $v['nombre_m']." ".$v['estado'];?> 
                                
                                </div>

                                <?php

                    }

                };
            ?>

            </div>





   

         
</div>







</div>


<?php

require_once("layouts/footer.php");

?>