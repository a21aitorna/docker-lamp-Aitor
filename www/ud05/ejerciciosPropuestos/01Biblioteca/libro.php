<?php
    require_once 'documento.php';

    class Libro extends Documento{
        
        private $titulo;
        private $autor;
        private $numPags;

        public function __construct($id, $formato, $anhoPublicacion, $titulo, $autor, $numPags){
            parent::__construct($id, $formato, $anhoPublicacion);
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->numPags = $numPags;
        }

        public function mostrarDatos(){
            parent::mostrarDatos();
            echo "Título del documento: ".$this->titulo."<br/>";
            echo "Autor del documento: ".$this->autor."<br/>";
            echo "Numero de paginas: ". $this->numPags."<br/><br/>";
        }
    }