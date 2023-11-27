<?php
include 'lib/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idDonante = validarInput($_GET['id']);

    try {
        $stmtDonante = $conn->prepare("SELECT nombre, apellidos, edad, grupo_sanguineo FROM donantes WHERE id = :idDonante");
        $stmtDonante->bindParam(':idDonante', $idDonante);
        $stmtDonante->execute();
        $donanteInfo = $stmtDonante->fetch(PDO::FETCH_ASSOC);

        $stmtDonaciones = $conn->prepare("SELECT fecha_donacion, fecha_proxima_donacion FROM historico WHERE donante = :idDonante ORDER BY fecha_donacion DESC");
        $stmtDonaciones->bindParam(':idDonante', $idDonante);
        $stmtDonaciones->execute();
        $donaciones = $stmtDonaciones->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>Donante: {$donanteInfo['nombre']} {$donanteInfo['apellidos']}</h2>";
        echo "<p>Edad: {$donanteInfo['edad']}</p>";
        echo "<p>Grupo Sanguíneo: {$donanteInfo['grupo_sanguineo']}</p>";

        if (count($donaciones) > 0) {
            echo "<h3>Lista de Donaciones:</h3>";
            echo "<ul>";
            foreach ($donaciones as $donacion) {
                echo "<li>Fecha de Donación: {$donacion['fecha_donacion']} - Fecha Próxima Donación: {$donacion['fecha_proxima_donacion']}</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay donaciones registradas para este donante.</p>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function validarInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $$input = htmlspecialchars($input);
    return $input;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<footer>
        <a href="index.php">Volver al principio</a>
    </footer>
</body>
</html>