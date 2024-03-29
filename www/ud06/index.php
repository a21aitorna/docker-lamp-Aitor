<?php

require 'flight/Flight.php';
// require 'flight/autoload.php';

// Conexion a la base de datos
Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas', 'root', 'test'));

// Mostrar todos los datos de los clientes
Flight::route('GET /clientes', function(){
    $sentencia = Flight::db()->prepare("SELECT * FROM clientes");
    $sentencia->execute();
    $datos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);
});

//Mostrar cliente por id
Flight::route('GET /clientes/@id', function($id){
    $sentencia = Flight::db()->prepare("SELECT * FROM clientes WHERE id=?");
    $sentencia->bindParam(1,$id);
    $sentencia->execute();
    $datos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);
});

//Añadir cliente
Flight::route('POST /clientes', function(){
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "INSERT INTO clientes (nombre, apellidos, edad, email, telefono) VALUES (?,?,?,?,?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$nombre);
    $sentencia->bindParam(2,$apellidos);
    $sentencia->bindParam(3,$edad);
    $sentencia->bindParam(4,$email);
    $sentencia->bindParam(5,$telefono);
    $sentencia->execute();

    Flight::jsonp(["Cliente agregado correctamente"]);
});

//Borrar cliente
Flight::route('DELETE /clientes', function () {
    $id = Flight::request()->data->id;
    $sql ="DELETE FROM clientes WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
   
    Flight::jsonp(["Cliente eliminado con id: $id"]);  
});

//Modificar cliente
Flight::route('PUT /clientes', function(){
    $id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
    $sql = "UPDATE clientes set apellidos=?, edad=?, email=?, telefono=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $apellidos);
    $sentencia->bindParam(2, $edad);
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $telefono);
    $sentencia->bindParam(5, $id);
    $sentencia->execute();

    Flight::jsonp(["Cliente modificado con id: $id"]); 
});

Flight::start();
