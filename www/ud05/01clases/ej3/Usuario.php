<?php
    class Usuario{
        private $id;
        private $nombre;
        private $apellidos;
        private $password;
        private $edad;
        private $provincia;

        public function __construct($nombre, $apellidos, $password, $edad, $provincia){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            $this->edad = $edad;
            $this->provincia = $provincia;
        }
        
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            return $this->id=$id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            return $this->nombre=$nombre;
        }

        public function getApellidos(){
            return $this->apellidos;
        }
        public function setApellidos($apellidos){
            return $this->apellidos=$apellidos;
        }

        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            return $this->password=$password;
        }

        public function getEdad(){
            return $this->edad;
        }
        public function setEdad($edad){
            return $this->edad=$edad;
        }

        public function getProvincia(){
            return $this->provincia;
        }
        public function setProvincia($provincia){
            return $this->provincia=$provincia;
        }
        
    }


?>