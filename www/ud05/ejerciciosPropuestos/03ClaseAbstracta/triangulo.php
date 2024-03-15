<?php
include_once "forma.php";
class Triangulo extends Forma{
    private $color=null;

    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color=$color;
    }

}