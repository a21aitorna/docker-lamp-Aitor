<?php
include_once "Animal.php";
use e4\Mascota;

class Perro extends Animal
{
    public function __construct($nombre, $edad){
        parent::__construct($nombre, $edad);
    }

    public function emitirSonido(){
        echo "Guau, guau <br>";
    }
}

?>