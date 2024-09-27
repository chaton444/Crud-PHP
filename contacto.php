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
  <br>
  <br><br>

  <h1>Contacto</h1>
  <article class="articuloform">

    <form action="http://localhost/Avancedeproyecto/php/enviar.php" method="POST">
      <label for="nombre">Nombre:</label>
      <br>
      <input type="text" id="nombre" name="nombre" required><br><br>

      <label for="correo">Correo electrónico:</label>
      <br>
      <input type="email" id="correo" name="correo" required><br><br>

      <label for="mensaje">Mensaje:</label><br>
      <br>
      <textarea id="mensaje" name="mensaje" required></textarea><br><br>

      <button type="submit" value="Enviar" name="enviar">Enviar</button>
    </form>

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