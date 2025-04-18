
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
//controlador
    require_once("modelo/index.php");

    class modelocontrolador{ //clase principal de modelo controlador

        private $model;
        public function __construct(){

            $this->model = new modelo();

        }

        //metodos
        static function inicio(){
            $producto= new modelo();
            $dato= $producto->mostrar();
            require_once("vista/v_principal.php");
        }


        static function nuevo(){        
            require_once("vista/v_nuevo.php");
        }

        static function visualizar(){
            $producto= new modelo();
            $dato= $producto->mostrar();
            
            require_once("vista/v_principal.php");
            //header("location: vista/v_principal.php");
        }


        //guardar
        static function guardar(){

            //buscar paciente primero por dni-si existe ya no lo agrega solo toma su id
            //y en caso no exita lo agrega y toma su id
            
            $paciente =$_REQUEST['dni'];
            $data = "'".$paciente."'";
            $tabla = "paciente";
            $id="id_paciente";
            $id_bus = new modelo();
            $date = $id_bus->buscar_id($id,$tabla,"dni='".$paciente."'");
            echo "estoy comprobando......",$date;
            var_dump($date);
            
            if(is_null($date)) //compueba que existe xliente o no --si la consulta devolvio algo
            //is null-dentra si es null---caso contrario no entra
            {
             echo "eestoy dentrode null----";
                //datos cliente
                $nombre= $_REQUEST['nombre'];
                $apellido= $_REQUEST['apellidos'];
                $dni= $_REQUEST['dni'];
                $edad= $_REQUEST['edad'];
                $telefono= $_REQUEST['telefono'];
                $correo= $_REQUEST['correo'];
                //$genero= $_REQUEST['genero'];
                //$genero= implode(', ',$_POST['genero']);--activar para el final

                $data_p="'".$nombre."',"."'".$apellido."',". "'".$dni."',"."'".$edad."'," ."'".$telefono."'," ."'".$correo."'";//+"'".$genero."'";
                $data_c_p = new modelo();
                $data = $data_c_p->insertar("paciente",$data_p);

                //busca paciente para sacar su id
                //$dni =$_REQUEST['dni'];
                //$data = "'".$dni."'";
                $tabla = "paciente";
                $id="id_paciente";
                $id_bus = new modelo();
                $date = $id_bus->buscar_id($id,$tabla,"dni='".$dni."'");

                echo "lo que devuelve buscar id al ingreas el paciente".$date;

            }else{


            }

            //datos de la cita

            if(isset($_GET["servicio"])){
                foreach($_GET["servicio"] as $servicio){
                    $servicio=$servicio;
                    echo "<p>ESTAS serR</p>";
                    echo "<p>{$servicio}</p>";
                }
            }

            $a="id_servicio";
            $tabla = "servicios";
           // $id_bus = new modelo();
            //$id_s= $id_bus->buscar_id($a,$tabla,"nombre="."'".$servicio."'");
            //echo "<p>{$id_s}</p>";
            //$id_s=$_SESSION["bus_id"];

            //echo "jdifj".$id_s;
            //medico
       
            if(isset($_GET["medico"])){
                foreach($_GET["medico"] as $medico){
                    $medico=$medico;
                }
             }
            $a="id_medico";
            $tabla = "medico";
            //$id_bus = new modelo();
            //$id_m= $id_bus->buscar_id($a,$tabla,"nombre="."'".$medico."'");
            //$id_m=$_SESSION["bus_id"];

            //echo "jdifj".$id_m;
             //paciente

            /* $data = "'".$dat."'";
            $tabla = "paciente";
            $id_bus = new Modelo();
            $id_m= $id_bus->buscar_id($tabla,$data);*/


            //$servicio= $_REQUEST['servicio'];
            $fecha= $_REQUEST['fecha'];
            
            

           $hora= $_REQUEST['hora'];

             


           //if(isset($_GET["hora"])){
            //foreach($_GET["hora"] as $hora){
              //  $hora=$hora;
                // }
             //}

             //estado

             $estado= $_REQUEST['estado'];
             // $hora= $_REQUEST['hora'];
             if(isset($_GET["estado"])){
              foreach($_GET["estado"] as $estado){
                  $estado=$estado;
                   }
               }



             //pago

             $pago= $_REQUEST['pago'];
             // $hora= $_REQUEST['hora'];
             if(isset($_GET["pago"])){
              foreach($_GET["pago"] as $pago){
                  $pago=$pago;
                   }
               }

              

            //data para consulta
            $data = "'".$servicio."',"."'".$medico."',"."'".$date."',"."1".","."'".$hora."',"."'".$fecha."',"."'".$estado."',"."'".$pago."'";
            echo "<p>{$data}</p>";
            $data_cita = new modelo();
            $dato = $data_cita->insertar("citas",$data);
/** 
            if($dato){

                echo "<script type='text/javascript'>
            alert('cita registrada')
               </script>";
            }else{

                echo "<script type='text/javascript'>
            alert('error al registrar')
               </script>";
            }
*/

            $email=$correo;
            $asunto="confirmacion de cita en clinica odontologica smile";
            $mensaje="su cita ha sido reservado para: servicio:".$servicio.",medico:".$medico.",hora:".$hora.",fecha:".$fecha.",estado:".$estado.",pago:".$pago.",nombre paciente:".$nombre.$apellido;

               //codigo para enviar email
/*
               $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'adontologicaclinicasmile@gmail.com';//correo                     //SMTP username
                    $mail->Password   = 'elhvlvgiqyqdyvig';  //contrasena                             //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('adontologicaclinicasmile@gmail.com', 'clinica odontologica smile');
                    $mail->addAddress("'".$correo."'");     //Add a recipient
                
                    //Attachments
                    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject =$asunto;
                    $mail->Body    = $mensaje;
                

                    $mail->send();
                    //echo 'el mensaje se envio corretamente';
                } catch (Exception $e) {
                    //echo "error al enviar. Mailer Error: {$mail->ErrorInfo}";
                }


                */

            //para la parte de el horario para poner no disponible
            if(preg_match("/30/i", $hora, $matches, PREG_OFFSET_CAPTURE)){

                $ingreso="final"; //coincide
            }else{

                $ingreso="ingreso";//no coincide
            }
            
            $data2="estado ='no disponible'"; //actualiza a no disponible

            $consul_1 = new modelo();
            $dato1 = $consul_1->actualizar("horario",$data2,"fecha_i='".$fecha."' and hora_".$ingreso."='".$hora." '");//tabla, condicion
            header("location: comprobador.php");
        }

        

        //editar
    static function editar(){    
        $id = $_REQUEST['id'];
        $producto = new modelo();
        $dato = $producto->mostrar_c("id_cita=".$id);        
        require_once("vista/v_modificar.php");
    }




    //actualizar
    static function actualizar(){


        //pacientes
        $id = $_REQUEST['id'];
        $nombre= $_REQUEST['nombre'];
        $apellido= $_REQUEST['apellidos'];
        $dni= $_REQUEST['dni'];
        $edad= $_REQUEST['edad'];
        $telefono= $_REQUEST['telefono'];
        $correo= $_REQUEST['correo'];

        //cita
        $id_c=$_REQUEST['id_ci'];

        if(isset($_GET["servicio"])){
            foreach($_GET["servicio"] as $servicio){
                $servicio=$servicio;
                echo "<p>ESTAS serR</p>";
                echo "<p>{$servicio}</p>";
            }
        }

       
        $fecha= $_REQUEST['fecha'];
        $hora= $_REQUEST['hora'];

         //estado

         if(isset($_GET["estado"])){
          foreach($_GET["estado"] as $estado){
              $estado=$estado;
               }
           }

         //pago

         if(isset($_GET["pago"])){
          foreach($_GET["pago"] as $pago){
              $pago=$pago;
               }
           }

        if(isset($_GET["medico"])){
            foreach($_GET["medico"] as $medico){
                $medico=$medico;
            }
         }

        $data = "nombre='".$nombre."',apellido='".$apellido."',dni='".$dni."',edad='".$edad."',telefono='".$telefono."',email='".$correo."'";

        $consul_1 = new modelo();
        $dato1 = $consul_1->actualizar("paciente",$data,"id_paciente=".$id);

       // header("location: comprobador.php");

        $data_2 = "id_servicio='".$servicio."',hora='".$hora."',fecha='".$fecha."',estado_cita='".$estado."',estado_pago='".$pago."',id_medico='".$medico."' ";
        $consul_2 = new modelo();

        $dato = $consul_2->actualizar("citas",$data_2,"id_cita=".$id_c);


        //para la parte de el horario para poner  no disponible
        if(preg_match("/30/i", $hora, $matches, PREG_OFFSET_CAPTURE)){

            $ingreso="salida"; //coincide
        }else{

            $ingreso="ingreso";//no coincide
        }
        
        $data2="estado ='no disponible'"; //actualiza a no disponible

        $consul_1 = new modelo();
        //$dato1 = $consul_1->actualizar("horario",$data2,"fecha_i='2022/12/12' and hora_".$ingreso."='".$hora." ' ");
       $dato1 = $consul_1->actualizar("horario",$data2,"fecha_i='".$fecha."' and hora_".$ingreso."='".$hora." ' ");


        header("location: comprobador.php");
    }


    //eliminar
    static function eliminar(){ //me deque a qui   
        $id = $_REQUEST['id'];
        $hora=$_REQUEST['hora'];
        $fecha=$_REQUEST['fecha'];

        $producto = new modelo();
        $dato = $producto->eliminar("citas","id_cita=".$id);

        //para la parte de el horario para poner no disponible
        if(preg_match("/30/i", $hora, $matches, PREG_OFFSET_CAPTURE)){

            $ingreso="salida"; //coincide
        }else{

            $ingreso="ingreso";//no coincide
        }
        
        $data2="estado ='disponible'"; //actualiza a no disponible

        $consul_1 = new modelo();
        $dato1 = $consul_1->actualizar("horario",$data2,"fecha_i='".$fecha."' and hora_".$ingreso."='".$hora." ' ");



        header("location:comprobador.php");
    }

    static function mostrarsegdatos(){

        $fecha= $_REQUEST['fecha'];

        if(isset($_GET["medico"])){
            foreach($_GET["medico"] as $medico){
                $medico=$medico;
            }
        }

            if(empty($medico)){

                $producto = new modelo();
                $dato = $producto->mostrar_c("citas.fecha ='".$fecha."'");
                require_once("vista/v_principal.php");

            }else{

                    $producto = new modelo();
                    $dato = $producto->mostrar_c("citas.id_medico=".$medico);
                    //var_dump($dato);
                    //header("location: comprobador.php");
                    require_once("vista/v_principal.php");

            }
        


    }


//codigo para modulo medico

    static function mostrar_m(){

        $producto= new modelo();
        $dato= $producto->mostrar_m();
        
        require_once("vista/v_medico.php");
    }

    static function nuevo_m(){
        require_once("vista/v_medico_regis.php");
        
    }

    static function guardar_m(){


            $codigo=$_REQUEST['codigo'];
            $nombre= $_REQUEST['nombre'];
            $apellido= $_REQUEST['apellidos'];
            $dni= $_REQUEST['dni'];
            $edad= $_REQUEST['edad'];
            $telefono= $_REQUEST['telefono'];
            $correo= $_REQUEST['correo'];
            $foto=$_REQUEST['imagen'];
  
             if(isset($_GET["especialidad"])){
              foreach($_GET["especialidad"] as $espe){
                  $espe=$espe;
                   }
               }

            $dia_regis=$_REQUEST['fecha'];

            $data_p="'".$codigo."',"."'".$nombre."',"."'".$apellido."',". "'".$espe."',"."'".$edad."'," ."'".$dni."'," ."'".$correo."',"."'".$telefono."','".$foto."','".$dia_regis."'" ;

           
            $data_c_p = new modelo();
            $data = $data_c_p->insertar("medico",$data_p);

            header("location:http://localhost/proyecto_html/comprobador.php?%20m=nuevo_m");

    }


    static function editar_m(){    
        $dni = $_REQUEST['dni'];
        $producto = new modelo();
        $dato = $producto->mostrar_m_e('dni="'.$dni.'"');        
        require_once("vista/v_modificar_m.php");
    }


    static function actualizar_m()
    {
            $id_m=$_REQUEST['id'];
            $codigo=$_REQUEST['codigo'];
            $nombre= $_REQUEST['nombre'];
            $apellido= $_REQUEST['apellidos'];
            $dni= $_REQUEST['dni'];
            $edad= $_REQUEST['edad'];
            $telefono= $_REQUEST['telefono'];
            $correo= $_REQUEST['correo'];
           
  
             if(isset($_GET["especialidad"])){
              foreach($_GET["especialidad"] as $espe){
                  $espe=$espe;
                   }
               }

            $dia_regis=$_REQUEST['fecha'];

            $data="cod_medico='".$codigo."',"."nombre_m='".$nombre."',"."apellido='".$apellido."',". "especialidad='".$espe."',"."edad='".$edad."'," ."dni='".$dni."'," ."email='".$correo."',"."telefono='".$telefono."',fecha='".$dia_regis."'" ;

            $tabla="medico";
            $condicion="id_medico=$id_m";

            $data_c_p = new modelo();
            $data = $data_c_p->actualizar($tabla, $data, $condicion);
          

            header("location:http://localhost/proyecto_html/comprobador.php?mm=mostrar_m");
    }


    static function eliminar_m(){ //me deque a qui   
        $id = $_REQUEST['id'];

        $producto = new modelo();
        $dato = $producto->eliminar("medico","id_medico=".$id);
        header("location:http://localhost/proyecto_html/comprobador.php?mm=mostrar_m");
    }


    //horarios

    static function mostrar_h(){

    
        require_once("vista/v_horarios.php");


    }

    static function visu_h(){ //para que sea automatico

        $fecha_h=date('y/m/d');
        $dia = date("d");
        $dia_d="y/m/".$dia + 0; //TE QUEDATE AQUI OJO ES ENTRE SEMANAS
        $fecha_2=date($dia_d);

        //$f_i="20".$fecha_h;
        //$f_f="20".$fecha_2;

       // $f_i="2022/12/12";
        //$f_f="2022/12/17";

       $f_i="2023/01/16";
        $f_f="2023/01/21";

       

        //$cond="horario.fecha_i='".$f_i."' OR horario.fecha_i='".$f_f."'" ;

        $cond="horario.fecha_i BETWEEN '".$f_i."' AND '".$f_f."'";

        //echo $fecha_2;
        //echo $cond;
        $producto= new modelo();
        $dato= $producto->mostrar_ho($cond);

        require_once("vista/visu_h.php");


    }

    static function vi_h_e(){//para que sea personalizado  para el usuario

        $fecha_1 = $_REQUEST['fecha1'];
        //echo$fecha_1;
        $fecha_2 = $_REQUEST['fecha2'];
        $cond="horario.fecha_i BETWEEN '".$fecha_1."' AND '".$fecha_2."'" ;
        $producto= new modelo();
        $dato= $producto->mostrar_ho($cond);

        require_once("vista/visu_h.php");

    }

    static function guardar_h(){

            $fecha = $_REQUEST['dia'];
            $hora_i= $_REQUEST['h_inicio'];
            $hora_f= $_REQUEST['h_final'];

            if(isset($_GET["medico"])){
                foreach($_GET["medico"] as $nom){
                    $nom=$nom;
                     }
                 }

                 if(isset($_GET["turno"])){
                    foreach($_GET["turno"] as $turno){
                        $turno=$turno;
                         }
                     }

                     if(isset($_GET["estado"])){
                        foreach($_GET["estado"] as $estado){
                            $estado=$estado;
                             }
                         }

                         if(isset($_GET["dias"])){
                            foreach($_GET["dias"] as $dias){
                                $dias=$dias;
                                 }
                             }



            $data_p="'".$fecha."',"."'".$nom."',"."'".$hora_i."',"."'".$hora_f."',"."'".$turno."','".$estado."','".$dias."'";

          // echo $data_p;
            $data_c_p = new modelo();
            $data = $data_c_p->insertar("horario",$data_p);

            ?>
            <input type="hidden" name="mh" value="mostrar_h">

            <?php

           
            header("location:http://localhost/proyecto_html/comprobador.php?mh=mostrar_h");


    }

    static function guardar_s(){

        $servicio=$_REQUEST['nom_servicio'];
        $duracion= $_REQUEST['duc_servicio'];
        $precio= $_REQUEST['precio_serv'];
               
        $data_p="'".$servicio."',"."'".$duracion."',"."'".$precio."'";

       
        $data_c_p = new modelo();
        $data = $data_c_p->insertar("servicios",$data_p);
        
        header("location:http://localhost/proyecto_html/comprobador.php?mh=mostrar_h");


    }






    }




?>

