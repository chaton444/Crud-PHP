<?php
// Conectarse a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "prueba");

// Realizar la consulta
$query = "SELECT * FROM productos WHERE id_producto";

$resultado = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://localhost/Avancedeproyecto/style.css">
  <title>Document</title>
</head>

<body>
  <nav>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" href="indexSuper.php">Menu</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" href="crear.php">Crear</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" href="modificar.php">Modificar</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" href="eliminar.php">Eliminar</a>
        </li>
      </ul>
    </div>
  </nav>
  <main>
    <br>
    <br>
    <article class="articuloform">
    <form action="http://localhost/Avancedeproyecto/adm/funciones.php" method="POST">

      <label for="borrar">Ingresa id del producto a eliminar:</label>
      id_producto
      <select name="borrar" id="borrar">
        <?php
        // Generar las opciones del elemento <select>
        if (mysqli_num_rows($resultado) > 0) {
          while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<option value="' . $row['id_producto'] . '">' . $row['nombre'] . '</option>';
          }
        }
        ?>
      </select>
      <br><br>

      <button type="submit">Eliminar</button>
    </form>
    </article>
  </main>

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
<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>