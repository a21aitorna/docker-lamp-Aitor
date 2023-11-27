<?php
include 'conexion.php';
try{
    $sql = "CREATE DATABASE IF NOT EXISTS donacion";
    $conn->exec($sql);

    $conn->exec("USE donacion");
    
    // Crear la tabla donantes
    $sql_tablaDonantes = "CREATE TABLE IF NOT EXISTS donantes (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        apellidos VARCHAR(255) NOT NULL,
        edad INT NOT NULL CHECK(edad > 18),
        grupo_sanguineo VARCHAR(5) NOT NULL,
        codigo_postal VARCHAR(5) NOT NULL,
        telefono_movil VARCHAR(9) NOT NULL
    )";
    $conn->exec($sql_tablaDonantes);
    
    // Crear la tabla historico
    $sql_tablaHistorico = "CREATE TABLE IF NOT EXISTS historico (
        id INT PRIMARY KEY AUTO_INCREMENT,
        donante INT,
        fecha_donacion DATE,
        fecha_proxima_donacion DATE,
        FOREIGN KEY (donante) REFERENCES donantes(id)
    )";
    $conn->exec($sql_tablaHistorico);
    
    // Crear la tabla administradores
    $sql_tablaAdministradores = "CREATE TABLE IF NOT EXISTS administradores (
        nombre_usuario VARCHAR(50) PRIMARY KEY,
        contraseña VARCHAR(200) NOT NULL
    )";
    $conn->exec($sql_tablaAdministradores);

}
catch(PDOException $e)
{
    echo "Error $e"; 
}    
    ?>
    


?>