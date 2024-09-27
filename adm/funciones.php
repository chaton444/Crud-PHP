<?php 
    $server_name  = "localhost";
    $user_name = "root";
    $pasword = "";
    $nombre_db = "prueba";
    $conexion = mysqli_connect($server_name, $user_name, $pasword, $nombre_db);
    
    if($conexion -> connect_error){
        die ("no se pudo conectar".$conexion->connect_error);
    } 

    echo "Form submitted";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $borrarProducto=$_POST['borrar'];


                $nueva="DELETE FROM productos WHERE id_producto=$borrarProducto";
                $crea=$conexion->query($nueva);
      
        }
        
    

    $conexion->close();
?>