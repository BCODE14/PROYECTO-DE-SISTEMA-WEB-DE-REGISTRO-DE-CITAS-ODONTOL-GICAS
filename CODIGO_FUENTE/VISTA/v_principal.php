<?php
/** 
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}*/
?>

        
    
        <?php

        require_once("layouts/header.php");
       

        ?>
        
    <!--    
    <div class="head_principal">
        <img src="vista/layouts/img_pro/logo.png" alt="">
        <div class="modulos">
            <div id="m_citas"class="btn_desliz">citas</div>
            <p class="btn_desliz">medicos</p>
            <p class="btn_desliz">Horarios</p>

        </div>

        <div class="icon_user">
            <span class="foto_user" >
                
            </span>
            <p class="btn_modulo">Admin <br> <?php //echo htmlspecialchars($_SESSION["username"]); ?></p>
            <span class="btn_menu_user"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </span>

        </div>
        
        
    </div>

    <div class="page-header">
        <h1>Hola, <b><?php //echo htmlspecialchars($_SESSION["username"]); ?></b> Bienvenida a reserva de citas clinica odontologica "smile"</h1>
        
    </div>
        <p class="conf">
        <a href="cambiar_contrasena.php" class="btn btn-warning">Cambia tu contraseña</a>
        <a href="salir.php" class="btn btn-danger">Cierra la sesión</a>
        </p>

-->
    <!--modulo citas-->

    <div class="modulo_citas">

        <p class="barra_cont" >Citas</p>

    
            <!--<div class="btn_nueva_cita">+ nueva cita</div>-->
            <div class="modulo_citas_nuevo">
            <a href="comprobador.php? m=nuevo" class="btn_nueva_cita">+ Nueva Cita</a>
            </div>
           
       

        <div class="modulo_citas_buscar">
           
               

                <form action="" method="GET" class="citas_bus_medico">


                <span id="icon_med" class="icon"></span>
                    <?php
                            $usuario = 'clin';
                            $password = '1234';
                            $db = new PDO('mysql:host=localhost;dbname=clinica', $usuario, $password);
                        ?>

                    <select class="sele_servicio" name="medico[]" >

                            <option value="" selected>Selecionar Medico</option>
                            <?php
                            $query = $db->prepare("SELECT * FROM medico");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores):
                            echo '<option value="'.$valores["id_medico"].'">'.$valores["nombre_m"].' '.$valores["apellido"].'</option>';
                            endforeach;
                            ?>
                    
                        </select>
                       
                        <span class="icon"></span>
                        <input  class="sele_servicio" type="date" id="start" name="fecha"
                          
                            min="2022-01-01" max="2023-12-31">

                       
                            <input type="hidden" name="m" value="mostrarsegdatos">
                        <input type="submit" class="btn_buscar" name="btn" value="buscar">
                    



                </form>
                         
        </div>



        <table class="tabla_cont">
            <tr class="tabla_cabeza">
                <td>NRO</td>
                <td>SERVICIO</td>
                <td>MEDICO</td> 
                <td>PACIENTE</td> 
                <td>DNI</td> 
                <td>EDAD</td> 
                <td>TELEFONO</td>
                <td>HORA</td>  
                <td>FECHA</td> 
                <td>ESTADO CITA</td> 
                <td>ESTADO PAGO</td> 
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
                                <td><?php echo $v['nombre_s'] ;?> </td>
                                <td><?php echo $v['nombre_m'] ;?> </td>
                                <td><?php echo $v['nombre'].$v['apellido']; ?> </td>
                                <td><?php echo $v['dni'] ?> </td>
                                <td><?php echo $v['edad'] ?> </td>
                                <td><?php echo $v['telefono'] ?> </td>
                                <td><?php echo $v['hora'] ?> </td>
                                <td><?php echo $v['fecha'] ?> </td>
                                <td><?php echo $v['estado_cita'] ?> </td>
                                <td><?php echo $v['estado_pago'] ?> </td>
                                <td>
                                    <a class="btn-c" href="comprobador.php?m=editar&id=<?php echo $v['id_cita']?>">EDITAR</a>
                                    <a class="btn-c" href="comprobador.php?m=eliminar&id=<?php echo $v['id_cita']?>&fecha=<?php echo $v['fecha']?>&hora=<?php echo $v['hora']?>" onclick="return confirm('Esta Seguro de Eliminar la cita'); false">ELIMINAR</a>
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