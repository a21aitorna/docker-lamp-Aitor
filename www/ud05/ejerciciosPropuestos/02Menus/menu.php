<?php

    class Menu{

        private $tipo;
        private $opciones = array();

        public function __construct($tipo){
            $this->tipo=$tipo;
        }

        public function  insertar($opcion){
            $this->opciones[]=$opcion;
        }
        
        public function dibujar(){
            for($i=0;$i<count($this->opciones);$i++){
                $this->opciones[$i]->dibujar();
            }
            if(strtolower($this->tipo)=="vertical"){
                echo "<br>";
            }
            else{
                echo " ";
            }
        }
    }