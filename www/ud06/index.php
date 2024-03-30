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

//Mostrar todos los datos de hoteles
Flight::route('GET /hoteles', function(){
    $sql = "SELECT * FROM hoteles";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->execute();
    $datos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);
});

//Mostrar datos del hotel por id
Flight::route('GET /hoteles/@id', function($id){
    $sql = "SELECT * FROM hoteles WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();
    $datos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);
});

//Insertar nuevo hotel
Flight::route('POST /hoteles', function(){
    $sql = "INSERT INTO hoteles (hotel, direccion, telefono, email) VALUES (?,?,?,?)";
    $nombreHotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $nombreHotel);
    $sentencia->bindParam(2, $direccion);
    $sentencia->bindParam(3, $telefono);
    $sentencia->bindParam(4, $email);

    $sentencia->execute();
    Flight::jsonp(["Hotel agregado correctamente"]);

});

//Eliminar hotel por id
Flight::route('DELETE /hoteles', function(){
    $sql = "DELETE FROM hoteles WHERE id=?";
    $id = Flight::request()->data->id;

    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp(["Hotel eliminado correctamente"]);
});

//Modificar hotel direccion, email y teléfono
Flight::route('PUT /hoteles', function(){
    $sql = "UPDATE hoteles SET direccion=?, email=?, telefono=? WHERE id=?";
    $direccion = Flight::request()->data->direccion;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;
    $id = Flight::request()->data->id;

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $direccion);
    $sentencia->bindParam(2, $email);
    $sentencia->bindParam(3, $telefono);
    $sentencia->bindParam(4, $id);

    $sentencia->execute();
    Flight::jsonp(["Hotel con id $id modificado correctamente"]);
});

Flight::start();
