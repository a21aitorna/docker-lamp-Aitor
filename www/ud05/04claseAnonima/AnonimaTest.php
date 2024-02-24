<?php
    $figura1 = new class(6,8) {
        private $base;
        private $altura;

        public function __construct($base, $altura){
            $this->base=$base;
            $this->altura=$altura;
        }

        public function getBase(){
            return $this->base;
        }

        public function setBase($base){
            return $this->base=$base;
        }

        public function getAltura(){
            return $this->altura;
        }

        public function setAltura($altura){
            return $this->altura=$altura;
        }

        public function area(){
            return ($this->getBase()*$this->getAltura())/2;
        }

        public function perimetro(){
            return 2*$this->getBase()+2*$this->getAltura();
        }

    };

    $figura2 = new class(42,42) {
        private $base;
        private $altura;

        public function __construct($base, $altura){
            $this->base=$base;
            $this->altura=$altura;
        }

        public function getBase(){
            return $this->base;
        }

        public function setBase($base){
            return $this->base=$base;
        }

        public function getAltura(){
            return $this->altura;
        }

        public function setAltura($altura){
            return $this->altura=$altura;
        }

        public function area(){
            return ($this->getBase()*$this->getAltura())/2;
        }

        public function perimetro(){
            return 2*$this->getBase()+2*$this->getAltura();
        }

    };

    $figura3 = new class(1,2) {
        private $base;
        private $altura;

        public function __construct($base, $altura){
            $this->base=$base;
            $this->altura=$altura;
        }

        public function getBase(){
            return $this->base;
        }

        public function setBase($base){
            return $this->base=$base;
        }

        public function getAltura(){
            return $this->altura;
        }

        public function setAltura($altura){
            return $this->altura=$altura;
        }

        public function area(){
            return ($this->getBase()*$this->getAltura())/2;
        }

        public function perimetro(){
            return 2*$this->getBase()+2*$this->getAltura();
        }

    };

    echo "FIGURA1 <br> Area: ".$figura1->area()."<br>Perimetro: ".$figura1->perimetro()."<br><br>";
    echo "FIGURA2 <br> Area: ".$figura2->area()."<br>Perimetro: ".$figura2->perimetro()."<br><br>";
    echo "FIGURA3 <br> Area: ".$figura3->area()."<br>Perimetro: ".$figura3->perimetro()."<br><br>";

?>