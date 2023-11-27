<?php
    include 'conexion.php';

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
    <form action="procesar_registro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>

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
        <input type="text" id="codigo_postal" name="codigo_postal" pattern="[0-9]{5}" required>

        <label for="telefono_movil">Teléfono Móvil:</label>
        <input type="text" id="telefono_movil" name="telefono_movil" pattern="[0-9]{9}" required>

        <button type="submit">Registrar</button>
    </form>

    <footer>
        <a href="index.php">Volver al principio</a>
    </footer>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = validarInput($_POST["nombre"]);
    $apellidos = validarInput($_POST["apellidos"]);
    $edad = validarInput($_POST["edad"]);
    $grupo_sanguineo = validarInput($_POST["grupo_sanguineo"]);
    $codigo_postal = validarInput($_POST["codigo_postal"]);
    $telefono_movil = validarInput($_POST["telefono_movil"]);

    if (!filter_var($edad, FILTER_VALIDATE_INT, array("options" => array("min_range" => 18)))) {
        die("La edad debe ser mayor de 18 años.");
    }
    $stmt = $conn->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil) VALUES (:nombre, :apellidos, :edad, :grupo_sanguineo, :codigo_postal, :telefono_movil)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
    $stmt->bindParam(':codigo_postal', $codigo_postal);
    $stmt->bindParam(':telefono_movil', $telefono_movil);

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
