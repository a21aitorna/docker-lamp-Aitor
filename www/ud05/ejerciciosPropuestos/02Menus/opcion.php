<?php

    class Opcion{

        private $titulo;
        private $enlace;
        private $colorFondo;

        public function __construct($titulo, $enlace, $colorFondo){
            $this->titulo = $titulo;
            $this->enlace = $enlace;
            $this->colorFondo = $colorFondo;
        }

        public function dibujar(){
            echo '<a style="background-color:'.$this->colorFondo.'" href="'.$this->enlace.'">'.$this->titulo.'</a>';
        }
    }