<?php
session_start();

if (isset($_SESSION["correo"])) {
  echo "<h1>hola bievenido " . $_SESSION["correo"] . "</h1>";

}

$server_name  = "localhost";
    $user_name = "root";
    $pasword = "";
    $nombre_db = "prueba";
    $conexion = mysqli_connect($server_name, $user_name, $pasword, $nombre_db);
    
    if($conexion -> connect_error){
        die ("no se pudo conectar".$conexion->connect_error);
    } 
    
    $sentencia="SELECT imagen FROM productos";
    $resultado = $conexion->query($sentencia);
    
    
    $img=array();
    while ($row=mysqli_fetch_array($resultado)){
      $img[]=$row['imagen'];
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=<link rel=" stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Importar archivos CSS de Bootstrap -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <!-- Importar archivos JS de Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src=function.js></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9./umd/popper.min.js"></script>
  <script>src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <title>Document</title>
</head>

<body>
  <nav>
     <img src="logo.jpg" style="width:50px; heigth:50px;">
    <div>
      <ul>
    
        <li>
          <a href="index.php">Menu</a>
        </li>
        <?php if (!isset($_SESSION["correo"])) { ?>
          <li>
            <a href="login.php">Iniciar Sesión</a>
            <ul>
              <li>
                <!-- Botón para abrir la ventana emergente -->
                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="cursor:pointer; width:100%;">
                  registrar
                </a>
              </li>
            </ul>
          </li>
        <?php } else { ?>
          <li>
            <a href="perfil.php">Mi perfil</a>
          </li>
        <?php } ?>
        <li>
          <a class="nav-item dropdown-toggle" href="categorias.php">Categorias</a>
          <ul class="Categorias">
            <li><a href="categoria1.php">Moderna</a></li>
            <li><a href="categoria2.php">Abstracta</a></li>
          </ul>
        </li>
        <li>
          <a href="productos.php">Productos</a>
        </li>
        <li>
          <a href="contacto.php">Contacto</a>
        </li>
        <li>
          <a href="comentarios.php">Comentarios</a>
        </li>
        <li>
          <a href="carrito.php">Carrito</a>
        </li>

<li>
<?php if (isset($_SESSION["correo"])) { ?>

<?php


if (isset($_POST['logout'])) {
  session_destroy(); //destruir todas las sesiones
  header("Location: login.php"); //redirigir a la página de inicio de sesión
}

?>

<form method="post">
  <button type="submit" name="logout" style="cursor:pointer;">Cerrar sesión </button>
</form>

<?php } ?>
</li>


      </ul>

    </div>
  </nav>
  <main>
  <div class="carousel slide" id="carouselExampleIndicators">
    <div class="carousel-indicators">
      <?php
      $cont=0;
      foreach($img as $imagen){
        $activa=$cont==0? "activa":"";
        echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$cont.'" ></button>';
        $cont++;
      }
      ?>
    </div>
    <div class="carousel-inner">
      <?php 
      $cont=0;
      foreach($img as $imagen){
        $activa=$cont==0? "activa": "";
        $par="adm/";
        echo '<div class="carousel-item'.$activa.'" >
          <img src="'.$par.$imagen.'" class="d-block" alt="Imagen '.$cont.'">
          </div>';
          $cont++;
      }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIncators" data-bs-slide="prev">
      <span class=carousel-control-prev-icon aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIncators" data-bs-slide="next">

  </main>
  



  
  <br>
  <!-- Ventana emergente -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <form id="miFormulario" method="POST" action="http://localhost/Avancedeproyecto/php/registro.php">
            <label for="Nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" id="Nombre">
            <br>
            <br>
            <label for="Apellido">Apellido:</label>
            <input type="text" name="apellido" placeholder="Apellido" id="Apellido">
            <br>
            <br>
            <label for="Contra">Contraseña:</label>
            <input type="password" name="contra" placeholder="Contraseña" id="Contra">
            <br>
            <br>
            <label for="confirContra">Confirmar Contraseña:</label>
            <input type="password" name="password" placeholder="confirmar Contraseña" id="confirContra">
            <br>
            <br>
            <label for="correo">Correo electrónico</label>
            <input id="correo" name="correo" placeholder="Escribe tu Correo" type="correo">
            <br>



            <button type="submit">Enviar</button>
            <br>
            <label id="errores"></label>
          </form>

        </div>
      </div>
    </div>
  </div>
   <br>
   <br>
   <br>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p>&copy; Fernando, Myriam, Brenda 2023</p>
        </div>
        <div class="col-md-6 text-right">
          <p><a>Política de privacidad</a> | <a>Términos y condiciones</a></p>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>