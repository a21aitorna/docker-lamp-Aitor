<?php

$servername = "db";
$username = "root";
$password = "test";
$dbname = "donacion";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("USE $dbname");

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

?>
