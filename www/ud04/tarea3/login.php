<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión, redirigir a index.php si es así
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require "lib/base_datos.php";
require "lib/utilidades.php";

$mensajes = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (empty($_POST["nombre"]) || empty($_POST["password"])) {
        $mensajes = "Falta el nombre de usuario o la contraseña";
    } else {
        $nombre = test_input($_POST["nombre"]);
        $password = test_input($_POST["password"]);

        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);

        $usuario = get_usuario($conexion, $nombre, $password);

        if ($usuario && password_verify($password, $usuario['hash_contrasenha'])) {
         
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_nombre'] = $usuario['nombre'];
            header("Location: index.php");
            exit();
        } else {
            
            $mensajes = "Nombre de usuario o contraseña incorrectos";
        }

        cerrar_conexion($conexion);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente - Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Iniciar Sesión</h1>

    <?= $mensajes; ?>

    <form method="post" action="login.php">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="nombre" autocomplete="off">
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" autocomplete="off">
        <br><br>
        <input type="submit" name="submit" value="Iniciar Sesión">
    </form>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>

</body>

</html>
