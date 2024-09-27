<?php
session_start();
if (isset($_SESSION["correo"])) {
    echo "<h1>hola bievenido " . $_SESSION["correo"] . "</h1>";

} else {
    echo "<h1>no inicio sesion " . $_SESSION["correo"] . "</h1>";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/Avancedeproyecto/style.css">
    <title>IndexSuper</title>
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
                <?php if (isset($_SESSION["correo"])) { ?>

                    <?php


                    if (isset($_POST['logout'])) {
                        session_destroy(); //destruir todas las sesiones
                        header("Location: ../login.php"); //redirigir a la página de inicio de sesión
                    }

                    ?>

                    <form method="post">
                        <button type="submit" name="logout" style="cursor:pointer;">Cerrar sesión </button>
                    </form>

                <?php } ?>
            </ul>
        </div>
    </nav>

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