

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
            <p class="titulo_modulo">Registrar Medico</p>
                <form action="" method="get" class="from_cont"    enctype="multipart/form-data" >
                

                <p class="titulo">Datos de Medico</p>
               

                <select class="sele_servicio" name="especialidad[]" >
                    <option value="value1" selected>Seleccionar Especialidad</option>
                    <option value="odontologia" >odontologia</option>
                    <option value="ortodoncia">ortodoncia</option>
                    <option value="protesis dental">protesis dental</option>

                </select>
                <input type="text" class="sele_servicio" name="codigo" placeholder="codigo" required>
                <input type="text" class="sele_servicio" name="nombre" placeholder="Nombre" pattern="[A-Za-z\s.]+" required>
                <input type="text" class="sele_servicio" name="apellidos" placeholder="Apellidos" pattern="[A-Za-z\s.]+" required>
                <input type="text" class="sele_servicio" name="dni" placeholder="Dni" pattern="[0-9]{8}" required>
                <input type="number" class="sele_servicio" id="edad" name="edad" placeholder="edad"
                 min="1" max="100">
                <input type="tel" class="sele_servicio" name="telefono" placeholder="Telefono" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required>
                <input type="email" class="sele_servicio" name="correo" placeholder="correo" >
                
                <input  class="sele_servicio" type="date" id="start" name="fecha"
                            value="fecha de registro"
                            min="2022-01-01" max="2024-12-31">


                
                <input type="hidden"   name="imagen" value="Ensaio Formatura - Fernanda - Pais_ Rita e Guilherme - Estudio Anaceli Nuffer.jpg" />
                <input type="hidden"   name="mm" value="guardar_m" />
                
                <input type="submit" class="btn_guardar" name="btn" value="Guardar">
                

                </form>
                
                </div>  

                <!--codiigo para foto medico-->

                <div class="datos_cita">
           
                <form action="subir.php" method="POST" class="from_cont"    enctype="multipart/form-data" >
                

                    <p class="titulo">Subir Foto Medico</p>
                
                    <label class="sele_servicio" >Foto</label>
                    <input type="file" name="image" />
                
                    <input type="submit" class="btn_guardar" name="submit" value="Subir">
                

                </form>
                
                </div>  




        </div>

        <?php

if(isset($_POST["submit"])){
    
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
        //Credenciales Mysql
       
                            $usuario = 'clin';
                            $password = '1234';
                            $db = new PDO('mysql:host=localhost;dbname=clinica', $usuario, $password);
    
        $query = $db->prepare("SELECT max(id_medico) FROM medico;");
        $query->execute();
        $data = $query->fetchAll();

        foreach ($data as $valores):
            $id= $valores[0];
        endforeach;

        
                //Insertar imagen en la base de datos
        $query = $db->prepare("UPDATE medico SET foto='$imgContenido' WHERE id_medico='$id'");
        $query->execute();

        if($query){
            //echo "<script type='text/javascript'>alert('Archivo Subido Correctamente')</script>";
        }else{
            //echo "<script type='text/javascript'>alert('error al Subir el archivo')</script>";
        } 

    }else{
        //echo "<script type='text/javascript'>alert('seleciones una imagen')</script>";
    }


}


?>


<?php

require_once("layouts/footer.php");

?>