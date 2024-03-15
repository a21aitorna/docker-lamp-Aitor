<?php
    require_once 'documento.php';

    class Revista extends Documento{

        private $titulo;
        private $numPags;

        public function __construct($id, $formato, $anhoPublicacion, $titulo, $numPags){
            parent::__construct($id, $formato, $anhoPublicacion);
            $this->titulo = $titulo;
            $this->numPags = $numPags;
        }

        public function mostrarDatos(){
            parent::mostrarDatos();
            echo "Titulo del documento: ".$this->titulo."<br/>";
            echo "Numero de paginas: ". $this->numPags."<br/><br/>";
        }
    }