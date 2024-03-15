<?php
include_once "Mascota.php";

abstract class Animal implements Mascota
{
    protected $nombre;
    protected $edad;

    public function __construct($nombre, $edad){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function obtenerNombre(){
        return sprintf("El nombre del %s es %s<br>", get_class($this), $this->nombre);
    }

    abstract public function emitirSonido();
}


