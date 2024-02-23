<?php
class Participante {

    private $nombre;
    private $edad;

    public function __construct($nombre, $edad){
        $this -> nombre=$nombre;
        $this -> edad=$edad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        return $this->nombre=$nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setEdad($edad){
        return $this->edad=$edad;
    }
}


?>