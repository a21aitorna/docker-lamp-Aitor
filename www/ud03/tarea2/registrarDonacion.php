<?php
include 'lib/conexion.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registroDonacion'])) {
    // Recoger y validar datos del formulario
    $idDonante = validarInput($_POST["idDonante"]);
    $fechaDonacion = validarInput($_POST["fechaDonacion"]);

    // Insertar en la tabla historico con fecha_proxima_donacion calculada automáticamente
    $stmt = $conn->prepare("INSERT INTO historico (donante, fecha_donacion, fecha_proxima_donacion) VALUES (:idDonante, :fechaDonacion, DATE_ADD(:fechaDonacion, INTERVAL 4 MONTH))");
    $stmt->bindParam(':idDonante', $idDonante);
    $stmt->bindParam(':fechaDonacion', $fechaDonacion);

    // Ejecutar la consulta
    $stmt->execute();

    echo "Donación registrada correctamente.";
}

// Función para validar la entrada y prevenir inyecciones SQL
function validarInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Obtener el ID del donante de la URL
$idDonante = $_GET['id'];

// Obtener información del donante
$stmtDonante = $conn->prepare("SELECT * FROM donantes WHERE id = :idDonante");
$stmtDonante->bindParam(':idDonante', $idDonante);
$stmtDonante->execute();
$donante = $stmtDonante->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Donación</title>
</head>
<body>
    <h2>Registrar Donación para <?php echo $donante['nombre'] . ' ' . $donante['apellidos']; ?></h2>

    <form method="post">
        <input type="hidden" name="idDonante" value="<?php echo $idDonante; ?>">
        <label for="fechaDonacion">Fecha de Donación:</label>
        <input type="date" id="fechaDonacion" name="fechaDonacion" required>
        <button type="submit" name="registroDonacion">Registrar Donación</button>
    </form>

    <footer>
        <a href="index.php">Volver al principio</a>
    </footer>
    
</body>
</html>
