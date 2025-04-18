
<?php
//Modelo
//aqui va muestra conexion da data base mysql-en xamp
//consultas a data base



require_once("controlador/index.php");

    class modelo{

        private $modelo;
        private $base_data;
        private $datos;
        private $resu;
        public function __construct(){

            $this->modelo = array();
            $this->base_data = new PDO('mysql:host=localhost;dbname=clinica',"clin","1234");
            //conexion a data base    
        }

        public function insertar($tabla,$data){

                $consulta="insert into ".$tabla." values(null,". $data .")";//null es cuando es autoincremental
                echo $consulta;
                $resultado=$this->base_data->query($consulta);
                if ($resultado) {
                    return true;
                }else {
                    return false;
                }
         
        }

        public function buscar_id($id,$tabla,$condi){

           
                $consul="select ".$id." from ".$tabla." where ".$condi.";";
                $resu=$this->base_data->query($consul);  
                var_dump($resu);
                $rows = $resu->fetchAll();


                foreach($rows as $row) {

                
                    $m_id=$row['id_paciente'];

                }
                echo $m_id;
                return $m_id;
  
        }


        public function mostrar(){ //mostrar cita


            $consul="SELECT citas.id_cita,servicios.nombre_s, medico.nombre_m, paciente.nombre, paciente.apellido, paciente.dni, paciente.edad, paciente.telefono, citas.hora, citas.fecha, citas.estado_cita, citas.estado_pago FROM citas INNER JOIN servicios ON citas.id_servicio = servicios.id_servicio INNER JOIN medico ON citas.id_medico = medico.id_medico INNER JOIN paciente ON citas.id_paciente = paciente.id_paciente;";
            $resu=$this->base_data->query($consul);  
            $datita=$resu->fetchALL();
            return $datita;      
           // while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
             //       $this->datos[]=$filas;
            //}
            //return $this->datos;
            
        } 

        public function mostrar_c($condic){ //mostrar cita


            $consul="SELECT citas.id_cita,citas.id_servicio,citas.id_medico,servicios.nombre_s, medico.nombre_m,paciente.id_paciente, paciente.nombre, paciente.apellido, paciente.dni, paciente.edad, paciente.telefono,paciente.email, citas.hora, citas.fecha, citas.estado_cita, citas.estado_pago FROM citas INNER JOIN servicios ON citas.id_servicio = servicios.id_servicio INNER JOIN medico ON citas.id_medico = medico.id_medico INNER JOIN paciente ON citas.id_paciente = paciente.id_paciente where ".$condic.";";
            $resu=$this->base_data->query($consul);  
            $dati=$resu->fetchALL();
            //var_dump($datita);
            return $dati;      
           // while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
             //       $this->datos[]=$filas;
            //}
            //return $this->datos;
            
        }


        public function actualizar($tabla, $data, $condicion){       
            $consulta="update ".$tabla." set ". $data ." where ".$condicion;
            //echo $consulta;
            $resultado=$this->base_data->query($consulta);
            if ($resultado) {
                return true;
            }else {
                return false;
            }
        }


        public function eliminar($tabla, $condicion){
            $eli="delete from ".$tabla." where ".$condicion;
            $res=$this->base_data->query($eli);
            if ($res) {
                return true; 
            }else {
                return false;
            }
        }


        public function mostrar_m(){ //mostrar cita


            $consul="SELECT * FROM medico";
            $resu=$this->base_data->query($consul);  
            $datita=$resu->fetchALL();
            return $datita;      
           // while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
             //       $this->datos[]=$filas;
            //}
            //return $this->datos;
            
        } 

        public function mostrar_m_e($condi){ //mostrar cita


            $consul="SELECT * FROM medico WHERE ".$condi.";";
           
            $resu=$this->base_data->query($consul);  
            $datita=$resu->fetchALL();
            return $datita;      
           // while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
             //       $this->datos[]=$filas;
            //}
            //return $this->datos;
            
        } 

        public function mostrar_ho($condi){ //mostrar cita


            $consul="SELECT horario.id_horario,horario.fecha_i,horario.medico,horario.hora_ingreso,horario.hora_salida,horario.turno,horario.estado,horario.dia,medico.nombre_m FROM horario INNER JOIN medico ON horario.medico = medico.id_medico WHERE ".$condi.";";//ojo aquite quedatettt
           
            $resu=$this->base_data->query($consul);  
            $datita=$resu->fetchALL();
           // var_dump($datita);
            return $datita;   

           // while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
             //       $this->datos[]=$filas;
            //}
            //return $this->datos;
            
        } 

        
        
        








    }




?>