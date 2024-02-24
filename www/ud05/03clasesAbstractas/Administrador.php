<?php
    require_once 'Persona.php';
    class Administrador extends Persona {
        public function __construct($id, $nombre, $apellidos) {
            $this->id=$id;
            $this->nombre=$nombre;
            $this->apellidos=$apellidos;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
        }
    
        public function getNombre() {
            return $this->nombre;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
        public function getApellidos() {
            return $this->apellidos;
        }
    
        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }
    
        public function accion() : string {
            return "La persona con id ". $this->getId(). ", nombre " . $this->getNombre() . " y apellidos " . $this->getApellidos() . " es un administrador.<br>";
        }
    }

?>