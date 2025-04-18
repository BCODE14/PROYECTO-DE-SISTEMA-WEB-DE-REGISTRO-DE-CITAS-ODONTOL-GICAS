<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'clin');
define('DB_PASSWORD', '1234');
define('DB_NAME', 'clinica');
 
/* datos para la conexion */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verefica conexion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>