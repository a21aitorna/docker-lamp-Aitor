<?php
session_start();

require "lib/base_datos.php";
require "lib/utilidades.php";

$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $nombre = test_input($_POST["nombre"]);
    $password = test_input($_POST["password"]);

    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $usuario = get_usuario_nombre($conexion, $nombre);

    if ($usuario->num_rows > 0) {
        $row = $usuario->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = $nombre;
            header("Location: index.php");
            exit();
        } else {
            $mensaje_error = "Contraseña incorrecta";
        }
    } else {
        $mensaje_error = "Usuario no encontrado";
    }

    cerrar_conexion($conexion);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Login</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?= $mensaje_error; ?>

    <p>Formulario de login</p>
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nombre: <input type="text" name="nombre">
        <br><br>
        Contraseña: <input type="password" name="password">
        <br><br>
        <input type="submit" name="submit" value="Login">
    </form>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
