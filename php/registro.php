<?php
 session_start();
$server_name  = "localhost";
$user_name = "root";
$pasword = "";
$nombre_db = "prueba";
$conexion = mysqli_connect($server_name, $user_name, $pasword, $nombre_db);

if($conexion -> connect_error){
    die ("no se pudo conectar".$conexion->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $correo = $_POST["correo"];
    $contraseña = $_POST["contra"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    $consulta ="SELECT * FROM usuarios WHERE correo = '$correo'";
    $existe=$conexion->query($consulta);
    if($existe->num_rows==1){
        echo"el correo o el usuario ya existe";
        
    } else{
        $insertar ="INSERT into usuarios (id_usuario, nombre, apellido, correo, contra) values (NULL, '$nombre', '$apellido', '$correo', '$contraseña')";
        $añadirUsuario=$conexion->query($insertar);
        header("Location: ../index.php");

    }
}
$conexion->close();

?>
