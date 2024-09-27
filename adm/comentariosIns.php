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

    echo "Form submitted";
    if($_SERVER["REQUEST_METHOD"]=="POST"){ 
        if(!isset($_SESSION["correo"])){
            header("location:../login.php");
            
            }else{
                $correo=$_SESSION["correo"];
                $comentario=$_POST['texto'];
                $consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
                $crea=$conexion->query($consulta);

                if($crea){
                    $row=mysqli_fetch_assoc($crea);
                    $id=$row['id_usuario'];
                    $insertarComentaria="INSERT INTO opiniones (id_opinion, idUsuario, mensaje) VALUES (NULL,'$id','$comentario') ";
                    $insertar=$conexion->query($insertarComentaria);
                    echo $id;
                }


                #$idUsuario =$crea['id_usuario'];
                    

            }
        }
        
    

    $conexion->close();
?>