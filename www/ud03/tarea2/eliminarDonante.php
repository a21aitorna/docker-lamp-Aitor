<?php
include 'lib/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idDonante = validarInput($_GET['id']);

    try {
        $conn->beginTransaction();

        $stmtEliminarDonaciones = $conn->prepare("DELETE FROM historico WHERE donante = :idDonante");
        $stmtEliminarDonaciones->bindParam(':idDonante', $idDonante);
        $stmtEliminarDonaciones->execute();

        $stmtEliminarDonante = $conn->prepare("DELETE FROM donantes WHERE id = :idDonante");
        $stmtEliminarDonante->bindParam(':idDonante', $idDonante);
        $stmtEliminarDonante->execute();

        $conn->commit();

        echo "Donante y sus donaciones eliminados correctamente.";

    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

function validarInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
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