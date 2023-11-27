<?php

    function conexionBD() { 
        $host ='db';
        $username='root';
        $password= 'test';
        $conexion = mysqli_connect($host, $username, $password);

        if(!$conexion){
            die('La conexion ha fallado por el siguiente motivo: '. mysqli_connect_error());
        }
        return $conexion;
    }
  
    function creacionBD($conexion){
        $sqlCreacionDB = 'CREATE DATABASE IF NOT EXISTS tienda';
        if(mysqli_query($conexion, $sqlCreacionDB)){
            echo "La base de datos se ha creado bien o ya existe <br>";
        }
        else{
            echo "La creación de la base de datos ha fallado porque: ".mysqli_error($conexion);
        }
    }
   
    function seleccionDB($conexion){
        mysqli_select_db( $conexion, 'tienda');
    }
   
    function creacionTabla($conexion){
        $sqlCreacionTabla = 'CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50),
            apellidos VARCHAR(100),
            edad INT,
            provincia VARCHAR(50)
        )';
        if(mysqli_query($conexion, $sqlCreacionTabla)){
            echo "La tabla se ha creado bien o ya existe";
        }
        else{
            echo "La creación de la tabla ha fallado porque: ".mysqli_error($conexion);
        }
    }   
?>