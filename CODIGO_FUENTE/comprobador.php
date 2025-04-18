
<?php

require_once("controlador/index.php");

$op="mop";

$j="chepsito";
if(isset($_GET['m'])){

    $j='m';

}

$c="chepsito";
if(isset($_GET['mm'])){

    $c='mm';

}

$k="chepsito";
if(isset($_GET['mh'])){

    $k='mh';

}



if(strcmp($j,"m")== 0){

    $op="m";

}

if(strcmp($c,"mm")== 0){

    $op="mm";

}

if(strcmp($k,"mh")== 0){

    $op="mh";

}



switch($op){

    case "m":

        if(isset($_GET['m'])){//controlador citas

            if(method_exists("modelocontrolador",$_GET['m'])):

               


                modelocontrolador::{$_GET['m']}();
            endif;
        
        }else{

            
            modelocontrolador::inicio();
        }


        break;
    case "mm":

        if(isset($_GET['mm'])){//controlador medico

            if(method_exists("modelocontrolador",$_GET['mm'])):


                modelocontrolador::{$_GET['mm']}();
            endif;
        
        }else{

            
            modelocontrolador::mostrar_m();
        }

        break;
    case "mh":

        if(isset($_GET['mh'])){//controlador horario

            if(method_exists("modelocontrolador",$_GET['mh'])):
                
                
                modelocontrolador::{$_GET['mh']}();
            endif;
        
        }else{
        
            
            modelocontrolador::mostrar_h();
        
        }

        break;

    default:
             modelocontrolador::inicio();
    

}









/** 

if(isset($_GET['m'])){//controlador citas

    if(method_exists("modelocontrolador",$_GET['m'])):
        modelocontrolador::{$_GET['m']}();
    endif;

}else{

    if(isset($_GET['mm'])){//controlador medico

        if(method_exists("modelocontrolador",$_GET['mm'])):
            modelocontrolador::{$_GET['mm']}();
        endif;
    
    }else{


        if(isset($_GET['mh'])){//controlador horario

            if(method_exists("modelocontrolador",$_GET['mh'])):
                modelocontrolador::{$_GET['mh']}();
            endif;
        
        }else{
        
            modelocontrolador::inicio();
        
        }

    } 

}

*/
  

?>











