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
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descri'];
        $stock=$_POST['stock'];
        $precio=$_POST['precio']; 
        $idcategoria=$_POST['categoria'];
        
        
        if(isset($_POST["submit"])){
            $verificar=getimagesize($_FILES['img']['tmp_name']);
            if($verificar===false){
                echo "hay un error";
            }else{

                $nom_img=$_FILES['img']['name'];
                $temporal=$_FILES['img']['tmp_name'];
                $permantente="uploads/".$nom_img;

                move_uploaded_file($temporal,$permantente);

                $nueva="INSERT INTO productos (id_producto,nombre,descripcion,imagen,cantidad_stock,precio,idCategoria) VALUES (NULL,'$nombre','$descripcion','$permantente','$stock','$precio','$idcategoria')";
                $crea=$conexion->query($nueva);
            }
        }
        
    }

    $conexion->close();
?>