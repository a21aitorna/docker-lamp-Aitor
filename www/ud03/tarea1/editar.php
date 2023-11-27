<?php
include "lib/db_conf.php";
$conexion = conexionBD();
seleccionDB($conexion);


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardarModificaciones'])){
    $usuarioID = $_GET['id'];
    $nombreModificado = $_POST['nombreModificado'];
    $apellidosModificados = $_POST['apellidosModificado'];
    $edadModificada = $_POST['edadModificada'];
    $provinciaModificada = $_POST['provinciaModificada'];

    $sentencia = $conexion->prepare("UPDATE usuarios SET nombre=?, apellidos=?, edad=?, provincia=? WHERE id=?");
    $sentencia->bind_param("ssisi", $nombreModificado, $apellidosModificados, $edadModificada, $provinciaModificada, $usuarioID);
    $sentencia->execute();

    echo "Usuario modificado correctamente<br>";
    $conexion->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>

<form method='POST'>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombreModificado" value="<?php echo isset($usuario['nombre']) ? $usuario['nombre'] : ''; ?>" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidosModificado" value="<?php echo isset($usuario['apellidos']) ? $usuario['apellidos'] : ''; ?>" required><br>

    <label for="nombre">Edad:</label>
    <input type="number" name="edadModificada" value="<?php echo isset($usuario['edad']) ? $usuario['edad'] : ''; ?>" required><br>

    <label for="provincia">Provincia:</label>
    <input type="text" name="provinciaModificada" value="<?php echo isset($usuario['provincia']) ? $usuario['provincia'] : ''; ?>" required><br>

    <button type="submit" name="guardarModificaciones">Guardar modificaciones</button>
</form>

<footer>
    <a href="index.php">Volver a la pagina principal</a>
</footer>

</body>
</html>
