<?php
    include "lib/db_conf.php";

    $conexion = conexionBD();
    seleccionDB($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Bienvenido a esta tienda maravillosa!</h3>

    <a href="listar.php"><button type="submit" name="listarUsuario">Listar usuarios</button></a>
    <a href="formularioRegistro.php"><button type="submit" name="registrar">Anahadir usuario</button></a>

</body>
</html>