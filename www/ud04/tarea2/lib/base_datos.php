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
    if (!is_array($foto) || empty($foto["name"]) || empty($foto["size"]) || empty($foto["tmp_name"])) {
        die("Error: La información de la imagen no es válida.");
    }

    $ruta_destino = subir_imagen($foto);

    $sql = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, unidades, foto) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("ssdds", $nombre, $descripcion, $precio, $unidades, $ruta_destino);

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

function crear_tabla_imagenes_producto($conexion){
    $sql ="CREATE TABLE IF NOT EXISTS imagenes_producto (
        id_producto INT(6),
        imagen_producto BLOB,
        PRIMARY KEY (id_producto),
        FOREIGN KEY (id_producto) REFERENCES productos(id)
    )";
    ejecutar_consulta($conexion, $sql);
    
}
function dar_alta_productos($conexion, $nombre, $descripcion, $precio, $unidades, $fotos)
{
    $sql = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, unidades) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssdd", $nombre, $descripcion, $precio, $unidades);

    if (!$sql->execute()) {
        die("Error al dar de alta el producto: " . $conexion->error);
    }

    $id_producto = $sql->insert_id;

    foreach ($fotos["tmp_name"] as $key => $archivoTemporal) {
        $nombreArchivo = $fotos["name"][$key];
        $tamanhoArchivo = $fotos["size"][$key];
        $imagenTemp = $fotos["tmp_name"][$key];

        if (compruebaExtension($nombreArchivo) && compruebaTamanho($tamanhoArchivo)) {
            $ruta_destino = subir_imagen($imagenTemp);

            if ($ruta_destino) {
                insertar_imagen_producto($conexion, $id_producto, $ruta_destino);
            } else {
                die("Error al subir la imagen al servidor.");
            }
        } else {
            die("Error: La imagen debe ser de formato PNG, JPG, JPEG o GIF y no debe superar los 50 MB.");
        }
    }

    return true;
}



function insertar_imagen_producto($conexion, $id_producto, $ruta_imagen)
{
    $sql = $conexion->prepare("INSERT INTO imagenes_producto (id_producto, imagen_producto) VALUES (?, ?)");
    $sql->bind_param("is", $id_producto, $ruta_imagen);

    if (!$sql->execute()) {
        die("Error al insertar la imagen del producto: " . $conexion->error);
    }
}

function subir_imagenes($fotos)
{
    $ruta_destino = "uploads/";
    $rutas_imagenes = [];

    foreach ($fotos["tmp_name"] as $key => $archivoTemporal) {
        $nombreArchivo = $fotos["name"][$key];
        $nombreUnico = uniqid() . "_" . $nombreArchivo;
        $ruta_destino_completa = $ruta_destino . $nombreUnico;

        if (move_uploaded_file($archivoTemporal, $ruta_destino_completa)) {
            $rutas_imagenes[] = $ruta_destino_completa;
        } else {
            die("Error al mover la imagen al servidor.");
        }
    }

    return $rutas_imagenes;
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}
