<?php

    class Documento{

        private $id;
        protected $formato;
        private $anhoPublicacion;

        public function __construct($id, $formato, $anhoPublicacion){
            $this->id = $id;
            $this->formato = $formato;
            $this->anhoPublicacion = $anhoPublicacion;
        }

        // public function __destruct(){
        //     echo 'Se ha eliminado un documento';
        // }

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            return $this->id=$id;
        }

        public function getFormato(){
            return $this->formato;
        }
        public function setFormato($formato){
            return $this->formato=$formato;
        }

        public function getAnhoPublicacion(){
            return $this->anhoPublicacion;
        }
        //Esto sirve para modificar el año de publicacions
        public function setAnhoPublicacion($anhoPublicacion){
            return $this->anhoPublicacion=$anhoPublicacion;
        }
        
        public function mostrarDatos(){
            echo "ID del documento: ".$this->id."<br/>";
            echo "Formato del documento: ".$this->formato."<br/>";
            echo "Año de publicacion: ". $this->anhoPublicacion."<br/>";
        }
    }