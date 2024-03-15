<?php

namespace e3;

include_once "Figura.php";
use e3\Figura;

class Rectangulo extends Figura
{
    private $ancho;
    private $alto;

    public function __construct($ancho, $alto){
        $this->ancho=$ancho;
        $this->alto=$alto;
    }

    public function dibujar(){
        echo "Se está dibujando un rectangulo con ancho ".$this->ancho." y con alto ".$this->alto."<br>";
    }

    public function agrandar($factor){
        $this->ancho = $this->ancho*$factor;
        $this->alto = $this->alto*$factor;
        echo "El nuevo ancho es ".$this->ancho." y el nuevo alto es ".$this->alto."<br>";
    }

    public function encoger($factor){
        $this->ancho = $this->ancho/$factor;
        $this->alto = $this->alto/$factor;
        echo "El nuevo ancho es ".$this->ancho." y con alto ".$this->alto."<br>";
    }
}
