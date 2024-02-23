<?php
    require_once 'Participante.php';
    class Arbitro extends Participante{
        
        private $anhosArbitrados;
        
        public function __construct($nombre, $edad, $anhosArbitrados){
            parent::__construct($nombre, $edad);
            $this->anhosArbitrados=$anhosArbitrados;
        }

        public function getAnhosArbitrados(){
            return $this->anhosArbitrados;
        }

        public function setAnhosArbitrados($anhosArbitrados){
            return $this->anhosArbitrados=$anhosArbitrados;
        }

    }

?>