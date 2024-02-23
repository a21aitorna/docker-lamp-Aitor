<?php
    require_once 'Participante.php';

    class Jugador extends Participante{
        private $posicion;
        
        public function __construct($nombre, $edad, $posicion){
            parent::__construct($nombre,$edad);
            $this->posicion=$posicion;
        }

        public function getPosicion(){
            return $this->posicion;
        }

        public function setPosicion($posicion){
            return $this->posicion=$posicion;
        }


    }

?>