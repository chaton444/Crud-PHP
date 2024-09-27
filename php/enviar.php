<?php 
     $server_name  = "localhost";
     $user_name = "root";
     $pasword = "";
     $nombre_db = "prueba";
     $conexion = mysqli_connect($server_name, $user_name, $pasword, $nombre_db);
     
     if($conexion -> connect_error){
         die ("no se pudo conectar".$conexion->connect_error);
     } 

if($_SERVER["REQUEST_METHOD"]=="POST"){
// Recoge los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

// Inserta los datos en la base de datos
$sql = "INSERT INTO contacto (id_Contacto ,nombre, correo, mensaje) VALUES (NUll,'$nombre', '$correo', '$mensaje')";
$nueva=$conexion->query($sql);

if($nueva){
    echo 'Mensaje enviado correctamente';
} else {
    echo 'Error al enviar el mensaje';
}
}
// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
