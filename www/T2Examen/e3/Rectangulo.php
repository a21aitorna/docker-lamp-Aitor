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
        $anchoAgrandado = $this->ancho*$factor;
        $altoAgrandado = $this->alto*$factor;
        echo "El nuevo ancho es ".$anchoAgrandado." y el nuevo alto es ".$altoAgrandado."<br>";
    }

    public function encoger($factor){
        $anchoEncogido = $this->ancho/$factor;
        $altoEncogido = $this->alto/$factor;
        echo "El nuevo ancho es ".$anchoEncogido." y el nuevo alto es ".$altoEncogido."<br>";
    }
}
