<?php
include 'lib/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registroDonantes'])) {
    $nombre = validarInput($_POST['nombre']);
    $apellidos = validarInput($_POST['apellidos']);
    $edad = validarInput($_POST['edad']);
    $grupo_sanguineo = validarInput($_POST['grupo_sanguineo']);
    $codigo_postal = validarInput($_POST['codigo_postal']);
    $telefono_movil = validarInput($_POST['telefono_movil']);


    $stmt = $conn->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil) VALUES (:nombre, :apellidos, :edad, :grupo_sanguineo, :codigo_postal, :telefono_movil)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
    $stmt->bindParam(':codigo_postal', $codigo_postal);
    $stmt->bindParam(':telefono_movil', $telefono_movil);

    // Ejecutar la consulta
    $stmt->execute();

    echo "Donante registrado correctamente.";
}

function validarInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Donante</title>
</head>
<body>
    <h2>Registro de Nuevo Donante</h2>
    <form method="post">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required> <br> 

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required> <br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required> <br>

        <label for="grupo_sanguineo">Grupo Sanguíneo:</label>
        <select id="grupo_sanguineo" name="grupo_sanguineo" required> 
            <option value="O-">O-</option>
            <option value="O+">O+</option>
            <option value="A-">A-</option>
            <option value="A+">A+</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
        </select>

        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" pattern="[0-9]{5}" required> <br> 

        <label for="telefono_movil">Teléfono Móvil:</label>
        <input type="text" id="telefono_movil" name="telefono_movil" pattern="[0-9]{9}" required> <br>

        <button type="submit" name="registroDonantes">Registrar</button> <br>
    </form>

    <footer>
        <a href="index.php">Volver al principio</a>
    </footer>
</body>
</html>