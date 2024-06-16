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

//Mostrar cliente por id, por ejemplo la dirección para el cliente con id 4 sería /clientes/4; hay que añadir manualmente la dirección.
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

//Mostrar datos del hotel por id, por ejemplo, la dirección para el hotel con id 8 sería /hotel/8; hay que añadir manualmente la dirección.
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

//Modificar hotel 
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

//Mostrar reservas en todos los hoteles (en vez de que aparezca el las columnas de id_cliente e id_hotel, hice que aparezcan el nombre del cliente y el hotel al que están asociados).
Flight::route('GET /reservas', function(){
    $sql = "SELECT r.id, r.fecha_reserva, r.fecha_entrada, r.fecha_salida, c.nombre AS nombre_cliente, h.hotel AS nombre_hotel 
    FROM reservas r
    INNER JOIN clientes c ON r.id_cliente = c.id
    INNER JOIN hoteles h ON r.id_hotel = h.id";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->execute();
    $datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);
});

//Mostrar reserva por id (en vez de que aparezca el las columnas de id_cliente e id_hotel, hice que aparezcan el nombre del cliente y el hotel al que están asociados). Por ejemplo, la dirección para la reserva con id 10 es /reservas/10; hay que añadir manualmente la dirección.
Flight::route('GET /reservas/@id', function($id){
    $sql = "SELECT r.id, r.fecha_reserva, r.fecha_entrada, r.fecha_salida, c.nombre AS nombre_cliente, h.hotel AS nombre_hotel 
    FROM reservas r
    INNER JOIN clientes c ON r.id_cliente = c.id
    INNER JOIN hoteles h ON r.id_hotel = h.id WHERE r.id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    $datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    Flight::json($datos);

});

//Insertar reserva
Flight::route('POST /reservas', function(){

    $id_cliente = Flight::request()->data->id_cliente;
    $id_hotel = Flight::request()->data->id_hotel;
    $fecha_reserva = Flight::request()->data->fecha_reserva;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;

    //Se cuenta cuantas veces aparece el id_cliente en la columna id de clientes (solo puede ser el resultado 0 o 1 vez)
    $sql_cliente = "SELECT COUNT(*) FROM clientes WHERE id = ?";
    $sentencia_cliente = Flight::db()->prepare($sql_cliente);
    $sentencia_cliente->bindParam(1, $id_cliente);
    $sentencia_cliente->execute();
    $comprobar_cliente = $sentencia_cliente->fetchColumn();

    //Se cuenta cuantas veces aparece el id_hotel en la columna id de clientes (solo puede ser el resultado 0 o 1 vez)
    $sql_hotel = "SELECT COUNT(*) FROM hoteles WHERE id = ?";
    $sentencia_hotel = Flight::db()->prepare($sql_hotel);
    $sentencia_hotel->bindParam(1, $id_hotel);
    $sentencia_hotel->execute();
    $comprobar_hotel = $sentencia_hotel->fetchColumn();

    //Comprobacion si existen los ids que son claves foraneas
    if($comprobar_cliente>0 && $comprobar_hotel>0){
        $sql = "INSERT INTO reservas (id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida) VALUES (?,?,?,?,?)";
        $sentencia = Flight::db()->prepare($sql);
        $sentencia->bindParam(1, $id_cliente);
        $sentencia->bindParam(2, $id_hotel);
        $sentencia->bindParam(3, $fecha_reserva);
        $sentencia->bindParam(4, $fecha_entrada);
        $sentencia->bindParam(5, $fecha_salida);
        if($sentencia->execute()){
            Flight::halt(200, "Reserva introducida correctamente");
        }
        else{
            Flight::jsonp(["Error en la reserva"]);
        }    
    }
    else{
        Flight::halt(400, "El cliente o el hotel no existen");
    }
});

//Eliminar reserva
Flight::route('DELETE /reservas', function(){
    $sql = "DELETE FROM reservas WHERE id=?";
    $id = Flight::request()->data->id;
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp(["Reserva eliminada correctamente"]);
});

//Modificar reserva fecha de entrada y la fecha de salida
Flight::route('PUT /reservas', function(){
    $sql = "UPDATE reservas SET fecha_entrada=?, fecha_salida=? WHERE id=?";
    $id = $id = Flight::request()->data->id;
    $fecha_entrada = Flight::request()->data->fecha_entrada;
    $fecha_salida = Flight::request()->data->fecha_salida;
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $fecha_entrada);
    $sentencia->bindParam(2, $fecha_salida);
    $sentencia->bindParam(3, $id);
    $sentencia->execute();
    Flight::jsonp(["Reserva modificada correctamente"]);
});

Flight::start();
