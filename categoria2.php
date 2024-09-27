<?php
session_start();

if (isset($_SESSION["correo"])) {
  echo "<h1>hola bievenido " . $_SESSION["correo"] . "</h1>";

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

  <title>Document</title>
</head>

<body>
  <nav>
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
  <br><br><br><br>

  <article>
    <div class="contenedor-tablas">

      <?php
      // Conexión a la base de datos
      $server_name = "localhost";
      $user_name = "root";
      $pasword = "";
      $nombre_db = "prueba";
      $conexion = mysqli_connect($server_name, $user_name, $pasword, $nombre_db);
      if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
      }

      // Consulta para obtener los productos
      $sql = "SELECT * FROM productos  WHERE idCategoria='2'";
      $resultado = $conexion->query($sql);

      // Verificación si hay productos
      if ($resultado->num_rows > 0) {
        // Mostrando los productos en la tabla
        // Mostrando los productos en la tabla
        while ($row = $resultado->fetch_assoc()) {
          echo "<table class='tabla-horizontal'>
    <tr>
    <td ><img class='imagen'  width='350px'  height='400px' src='adm/" . $row["imagen"] . "' ></img></td>
    
   </tr>
            <tr class='nombreproducto'>
              
              <td >" . $row["nombre"] . "</td>
            </tr>
            <tr>
            
              <td>" . $row["descripcion"] . "</td>
            </tr>
            <tr>
 
              <td>$" . $row["precio"] . "</td>
            </tr>
           
          </table>
          <hr>
          </br>";

        }

      } else {
        echo "No hay productos para mostrar";
      }

      // Cierre de la conexión a la base de datos
      $conexion->close();
      ?>


    </div>

  </article>

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