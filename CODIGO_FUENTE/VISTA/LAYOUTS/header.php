<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>smile clinica odontologica</title>
    <link rel="shortcut icon" href="vista/layouts/img_pro/icono.ico">
    <link rel="stylesheet" href="vista/layouts/estilos.css">
   
</head>
<body>

<div class="head_principal">
        <img src="vista/layouts/img_pro/logo.png" alt="">
        <div class="modulos">
            <a id="m_citas"class="btn_desliz" href="comprobador.php?m=inicio" >citas</a> 
            <a id="m_medicos" class="btn_desliz" href="comprobador.php?mm=mostrar_m">medicos</a>
            <a id="m_horarios" class="btn_desliz" href="comprobador.php?mh=mostrar_h">Horarios</a>

        </div>

        <div class="icon_user">
            <span class="foto_user" >
                
            </span>
            <p class="btn_modulo">Admin <br> <?php echo htmlspecialchars($_SESSION["username"]); ?></p>


            <nav class="btn_menu_user">
                
         

               
            <li class="dropdown-li" >
                 <svg class="btn_ico" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>

                    <ul class="dropdown">
                        <li><a href="cambiar_contrasena.php" class="btn btn-warning">Cambia tu contraseña</a></li>
                        <li><a href="salir.php" class="btn btn-danger">Cierra la sesión</a></li>
                    </ul>
                </li>
              
          
              
                
            </nav>


        </div>
        
        
    </div>

    <div class="page-header">
     <!-- <h1>Hola, <b><?php //echo htmlspecialchars($_SESSION["username"]); ?></b> Bienvenida a reserva de citas clinica odontologica "smile"</h1>
-->
    </div>
        
    <!--contenido-->

    








    
