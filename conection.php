<?php

$server_name  = "localhost";
$user_name = "";
$pasword = "";
$nombre_db = "";
$conexion = new mysql($server_name, $user_name, $pasword, $nombre_db);

if($conexion -> connect_error){
    die ("no se pudo conectar".$conexion->connect_error);
} 

?>