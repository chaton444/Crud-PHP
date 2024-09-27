<?php
// Conectarse a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "prueba");

// Realizar la consulta
$query = "SELECT * FROM productos WHERE id_producto";
// Realizar la consulta de categoria
$query2 = "SELECT * FROM categorias  WHERE id_categoria";
$resultado = mysqli_query($conexion, $query);
$resultadoca = mysqli_query($conexion, $query2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://localhost/Avancedeproyecto/style.css">
  <!-- CSS de select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- JS de select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
    <form method="POST" enctype="multipart/form-data">
      <label>Ingresa id del producto a buscar</label>
      <select name="id_producto" class="select2" style="width: 30%">
        <!-- opciones del select aquí -->
        <?php
        // Generar las opciones del elemento <select>
        if (mysqli_num_rows($resultado) > 0) {
          while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<option value="' . $row['id_producto'] . '">' . $row['id_producto'] . ' ' . $row['nombre'] . '</option>';

          }
        }

        ?>
      </select>

      <script>
        $(document).ready(function () {
          $('.select2').select2();
        });

      </script>
      </select>
      <button type="submit">Buscar</button>
    </form>

    <?php
    // Conectarse a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "prueba");

    // Realizar la consulta para obtener todos los productos
    $query = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $query);

    // Inicializar variables para almacenar los datos del producto seleccionado
    $nombre = "";
    $descripcion = "";
    $stock = 0;
    $precio = 0;

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Obtener el valor seleccionado
      $id_producto = $_POST['id_producto'];

      // Realizar la consulta para obtener el producto seleccionado
      $query = "SELECT * FROM productos WHERE id_producto = $id_producto";
      $resultado_producto = mysqli_query($conexion, $query);

      // Verificar si se encontró el producto
      if (mysqli_num_rows($resultado_producto) > 0) {
        // Obtener los datos del producto
        $producto = mysqli_fetch_assoc($resultado_producto);

        $nombre = $producto['nombre'];
        $descripcion = $producto['descripcion'];
        $stock = $producto['cantidad_stock'];
        $precio = $producto['precio'];
        $id_categoria = $producto['idCategoria'];
        $img = $producto['imagen'];
      }
    }
    ?>

    <form method="POST" action="http://localhost/Avancedeproyecto/adm/update.php" enctype="multipart/form-data">
      <input name="producto" value="<?php echo $id_producto; ?>"></input>
      <br>
      <label>Nombre</label>
      <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br><br>
      <label>Descripcion</label>
      <input type="text" name="descri" value="<?php echo $descripcion; ?>"><br><br>
      <label>Stock</label>
      <input type="number" name="stock" value="<?php echo $stock; ?>"><br><br>
      <label>Precio</label>
      <input type="number" name="precio" value="<?php echo $precio; ?>"><br><br>
      <label for="categoria">Selecciona una categoría:</label>

      <select name="categoria" id="categoria">
        <?php
        // Generar las opciones del elemento <select>
        if (mysqli_num_rows($resultadoca) > 0) {
          while ($row = mysqli_fetch_assoc($resultadoca)) {
            echo '<option value="' . $row['id_categoria'] . '">' . $row['descripcion'] . '</option>';
          }
        }
        ?>
      </select>
      <br><br>
      <img width='200px' height='200px' name="img" src="<?php echo $img; ?>"> </img>
      <br><br>
      <label>Imagen</label>
      <input type="file" value="<?php echo $img; ?>" name="img"><br><br>
      <button type="submit" name="submit">Actualizar</button>
    </form>

      </article>
  </main>
</body>

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

</html>
<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>