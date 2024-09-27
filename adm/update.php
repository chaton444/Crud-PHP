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
        $idProducto = $_POST['producto'];
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descri'];
        $stock=$_POST['stock'];
        $precio=$_POST['precio']; 
        $img=$_FILES['img'];
        $idcategoria=$_POST['categoria'];
        
        
        if(isset($_POST["submit"])){
            if ($_FILES['img']['size'] == 0) {
                // No se ha seleccionado ninguna imagen
                $nueva = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', cantidad_stock='$stock', precio='$precio', idCategoria='$idcategoria' WHERE id_producto='$idProducto'";
                $crea=$conexion->query($nueva);
            } else {
                // Se ha seleccionado una imagen
                $verificar=getimagesize($_FILES['img']['tmp_name']);
                if($verificar===false){
                    echo "Error: no hay imagen";
                } else {
                    $nom_img=$_FILES['img']['name'];
                    $temporal=$_FILES['img']['tmp_name'];
                    $permantente="uploads/".$nom_img;
            
                    move_uploaded_file($temporal,$permantente);
            
                    $nueva = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', imagen='$permantente', cantidad_stock='$stock', precio='$precio', idCategoria='$idcategoria' WHERE id_producto='$idProducto'";
                    $crea=$conexion->query($nueva);
                    if(!$crea){
                        die('Error en la consulta: ' . mysqli_error($conexion));
                    }
                }
            }
            
            
        }
        
    }

    $conexion->close();
?>