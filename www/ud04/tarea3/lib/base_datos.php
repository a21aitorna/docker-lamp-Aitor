<?php

function get_conexion()
{
    $conexion = new mysqli('db', 'root', 'test');
  
    if ($conexion->connect_errno != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con numero" . $conexion->connect_errno);
    }
    
    return $conexion;
}

function seleccionar_bd_tienda($conexion)
{
    return $conexion->select_db("tienda");
}

function ejecutar_consulta($conexion, $sql)
{
    $resultado = $conexion->query($sql);

    if ($resultado == false) {
        die($conexion->error);
    }

    return $resultado;
}

function crear_bd_tienda($conexion)
{
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    ejecutar_consulta($conexion, $sql);
}
//Tuve que poner contrasebha como text, ya que sino me daba fallo con ella, ya que la hice un hash, y el num de caracteres es grande
function crear_tabla_usuarios($conexion)
{
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
          id INT(6) AUTO_INCREMENT PRIMARY KEY , 
          nombre VARCHAR(50) NOT NULL , 
          contrasenha TEXT NOT NULL ,
          apellidos VARCHAR(100) NOT NULL ,
          edad INT(3) NOT NULL ,
          provincia VARCHAR(50) NOT NULL)";

    ejecutar_consulta($conexion, $sql);
}


function listar_usuarios($conexion)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}
 

function editar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia)
{
    $sql = "UPDATE usuarios
            SET nombre='$nombre' ,apellidos='$apellidos' ,edad='$edad',provincia='$provincia'
            WHERE id=$id;";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}


function dar_alta_usuario($conexion, $nombre, $password, $apellidos, $edad, $provincia)
{
    $sql = $conexion->prepare("INSERT INTO usuarios (nombre,contrasenha,apellidos,edad,provincia) VALUES (?,?,?,?,?)");
    $sql->bind_param("sssss", $nombre, $password, $apellidos, $edad, $provincia);
    return $sql->execute() or die($conexion->error);
}

function borrar_usuario($conexion, $id)
{
    $sql = "DELETE FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}

function get_usuario($conexion, $nombre, $contrasenha)
{
    $id=0;
    $hash_contrasenha = "";
    $sql = "SELECT id, nombre, contrasenha FROM usuarios WHERE nombre = ? LIMIT 1";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->bind_result($id, $nombre, $hash_contrasenha);
    $stmt->fetch();
    $stmt->close();

    return [
        'id' => $id,
        'nombre' => $nombre,
        'hash_contrasenha' => $hash_contrasenha,
    ];
}


