<?php
// Conectarse a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "prueba");

// Realizar la consulta
$query = "SELECT * FROM categorias  WHERE id_categoria";

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
    
    <form method="POST" enctype="multipart/form-data" action="http://localhost/Avancedeproyecto/adm/sentencias.php">
      <label>Nombre</label>
      <input type="text" name="nombre"><br><br>
      <label>Descripcion</label>
      <input type="text" name="descri"><br><br>
      <label>Stock</label>
      <input type="number" name="stock"><br><br>
      <label>Precio</label>
      <input type="number" name="precio"><br><br>

      <label for="categoria">Selecciona una categoría:</label>

      <select name="categoria" id="categoria">
        <?php
        // Generar las opciones del elemento <select>
        if (mysqli_num_rows($resultado) > 0) {
          while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<option value="' . $row['id_categoria'] . '">' . $row['descripcion'] . '</option>';
          }
        }
        ?>
      </select>
      <br><br>
      <label>Imagen</label>
      <input type="file" name="img"><br><br>
      <br>
      <button type="submit" name="submit">Crear</button>
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