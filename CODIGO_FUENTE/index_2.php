//archivo principal que se ejecuta al inicio-colunma vertebral de todo

<?php

    require_once("config.php");
    require_once("controlador/index.php");

    if(isset($_GET['m'])){

        if(method_exists("modelocontrolador",$_GET['m'])):
            modelocontrolador::{$_GET['m']}();
        endif;

    }else{


         modelocontrolador::inicio();

    }
        
  
?>