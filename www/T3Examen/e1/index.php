<?php

declare(strict_types=1);

require_once 'flight/Flight.php';
// require 'flight/autoload.php';

//Conexion a la base de datos
Flight::register('db', 'PDO', array('mysql:host=db;dbname=classicmodels', 'root', 'test'));

//Mostrar todos los customers
Flight::route('GET /customers', function(){
    $sentencia = Flight::db()->prepare("SELECT * FROM customers");
    $sentencia->execute();
    $datos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);
});

//Mostrar un customer según su id(customerNumber), hay que poner el id en su direccion
Flight::route('GET /customers/@customerNumber', function($customerNumber){
    $sentencia = Flight::db()->prepare("SELECT * FROM customers WHERE customerNumber=?");
    $sentencia->bindParam(1,$customerNumber);
    $sentencia->execute();
    $datos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);
});

//Insertar un customer 
Flight::route('POST /customers', function(){
    $customerNumber = Flight::request()->data->customerNumber;
    $customerName = Flight::request()->data->customerName;
    $contactLastName = Flight::request()->data->contactLastName;
    $contactFirstName = Flight::request()->data->contactFirstName;
    $phone = Flight::request()->data->phone;
    $addressLine1 = Flight::request()->data->addressLine1;
    $addressLine2 = Flight::request()->data->addressLine2;
    $city = Flight::request()->data->city;
    $state = Flight::request()->data->state;
    $postalCode = Flight::request()->data->postalCode;
    $country = Flight::request()->data->country;
    $salesRepEmployeeNumber = Flight::request()->data->salesRepEmployeeNumber;
    $creditLimit = Flight::request()->data->creditLimit;

    $sql = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state,postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)"; 

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $customerNumber);
    $sentencia->bindParam(2, $customerName);
    $sentencia->bindParam(3, $contactLastName);
    $sentencia->bindParam(4, $contactFirstName);
    $sentencia->bindParam(5, $phone);
    $sentencia->bindParam(6, $addressLine1);
    $sentencia->bindParam(7, $addressLine2);
    $sentencia->bindParam(8, $city);
    $sentencia->bindParam(9, $state);
    $sentencia->bindParam(10, $postalCode);
    $sentencia->bindParam(11, $country);
    $sentencia->bindParam(12, $salesRepEmployeeNumber);
    $sentencia->bindParam(13, $creditLimit);
    $sentencia->execute();

    Flight::jsonp(['El customer se agregó bien']);
});

//Eliminar customer por un id (customerNumber)
Flight::route('DELETE /customers', function () {
    $customerNumber = Flight::request()->data->customerNumber;
    $sql ="DELETE FROM customers WHERE customerNumber=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $customerNumber);
    $sentencia->execute();
   
    Flight::jsonp(["Cliente eliminado con id: $customerNumber"]);  
});

//Modificar campo phone de un customer
Flight::route('PUT /customers', function(){
    $customerNumber = Flight::request()->data->customerNumber;
    $phone = Flight::request()->data->phone;
    $sql = "UPDATE customers set phone=? WHERE customerNumber=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $phone);
    $sentencia->bindParam(2, $customerNumber);
    $sentencia->execute();

    Flight::jsonp(["Cliente modificado con customerNumber: $customerNumber"]); 
});

Flight::start();
