<?php

abstract class Notas {
    protected $notas;

    public function __construct($notas) {
        $this->notas = $notas;
    }

    public function getNotas() {
        return $this->notas;
    }

    abstract public function toString();
}
