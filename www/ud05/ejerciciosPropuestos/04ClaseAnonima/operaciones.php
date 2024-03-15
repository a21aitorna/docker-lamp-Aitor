<?php

$operaciones = new Class {
    public $x;
    public $y;

    public function multiplicar(){
        return $this->x * $this->y;
    }

    public function exponencial(){
        return pow($this->x, $this->y);
    }
};

$operaciones->x=6;
$operaciones->y=5;

echo "La multiplicacion es ".$operaciones->multiplicar();