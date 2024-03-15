<?php
    require_once 'documento.php';

    class Dvd extends Documento {

        private $numUds;
        private $formatoDvd;

        public function __construct($id, $formato, $anhoPublicacion, $numUds, $formatoDvd){
            parent::__construct($id, $formato, $anhoPublicacion);
            $this->numUds = $numUds;
            $this->formatoDvd = $formatoDvd;
        }

        public function mostrarDatos(){
            parent::mostrarDatos();
            echo "Numero unidades: ".$this->numUds."<br/>";
            echo "NFormato DVD ". $this->formatoDvd."<br/><br/>";
        }
    }