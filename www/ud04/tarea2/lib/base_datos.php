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

function crear_tabla_usuarios($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
          id INT(6) AUTO_INCREMENT PRIMARY KEY , 
          nombre VARCHAR(50) NOT NULL , 
          apellidos VARCHAR(100) NOT NULL ,
          edad INT (3) NOT NULL ,
          provincia VARCHAR(50) NOT NULL)";

    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_productos($conexion) {
    $sql = "CREATE TABLE IF NOT EXISTS productos(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        descripcion VARCHAR(100) NOT NULL,
        precio FLOAT NOT NULL,
        unidades FLOAT NOT NULL,
        foto blob NOT NULL)";

    ejecutar_consulta($conexion, $sql);
}

function listar_usuarios($conexion)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}
 
function get_usuario($conexion, $id)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios
            WHERE id=$id";

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


function dar_alta_usuario($conexion, $nombre, $apellidos, $edad, $provincia)
{
    $sql = $conexion->prepare("INSERT INTO usuarios (nombre,apellidos,edad,provincia) VALUES (?,?,?,?)");
    $sql->bind_param("ssss", $nombre, $apellidos, $edad, $provincia);
    return $sql->execute() or die($conexion->error);
}

function borrar_usuario($conexion, $id)
{
    $sql = "DELETE FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function dar_alta_producto($conexion, $nombre, $descripcion, $precio, $unidades, $foto)
{
    // Verificar que $foto es un array y contiene información
    if (!is_array($foto) || empty($foto["name"]) || empty($foto["size"]) || empty($foto["tmp_name"])) {
        die("Error: La información de la imagen no es válida.");
    }

    // Subir la imagen y obtener la ruta
    $ruta_destino = subir_imagen($foto);

    // Preparar y ejecutar la consulta SQL
    $sql = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, unidades, foto) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("ssdds", $nombre, $descripcion, $precio, $unidades, $ruta_destino);

    // Verificar si la ejecución fue exitosa
    if ($sql->execute()) {
        return true;
    } else {
        die("Error al dar de alta el producto: " . $conexion->error);
    }
}

function subir_imagen($foto)
{
    $directorioDestino = "uploads/";

    $nombreArchivo = $foto["name"];
    $tamanhoArchivo = $foto["size"];
    $archivoTemporal = $foto["tmp_name"];

    $nombreUnico = uniqid() . "_" . $nombreArchivo;

    $rutaDestinoCompleta = $directorioDestino . $nombreUnico;

    if (move_uploaded_file($archivoTemporal, $rutaDestinoCompleta)) {
        return $rutaDestinoCompleta;
    } else {
        die("Error al mover la imagen al servidor.");
    }
}


function cerrar_conexion($conexion)
{
    $conexion->close();
}
