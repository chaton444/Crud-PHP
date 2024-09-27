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
    $consulta ="SELECT * FROM usuarios WHERE correo = '$correo' AND  contra = '$contraseña'";
    $existe=$conexion->query($consulta);

    if($existe->num_rows==1){
        if ($correo == "root@admin.com" && $contraseña == "root"){
            $_SESSION["correo"] = $correo;
            header("Location: ../adm/indexSuper.php");
        }else{
            $_SESSION["correo"]=$correo;
            header("Location: ../index.php");
        }
    
    } else{

        echo"El usuario o Contraseña incorrecto";

    }
  
}
$conexion->close();

?>
