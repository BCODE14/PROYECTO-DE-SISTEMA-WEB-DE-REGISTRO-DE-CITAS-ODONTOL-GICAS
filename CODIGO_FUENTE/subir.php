
<?php

header("location:http://localhost/proyecto_html/comprobador.php?mm=mostrar_m");

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



