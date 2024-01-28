<?php
class Contacto{
    private $nombre;
    private $apellidos;
    private $numTelefono;

    public function __construct($nombre, $apellidos, $numTelefono){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->numTelefono = $numTelefono;
    }

    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    public function get_nombre(){
        return $this->nombre;
    }

    public function set_apellidos($apellidos){
        $this->apellidos = $apellidos;
    }
    public function get_apellidos(){
        return $this->apellidos;
    }

    public function set_numTelefono($numTelefono){
        $this->numTelefono = $numTelefono;
    }
    public function get_numTelefono(){
        return $this->numTelefono;
    }

    public function mostrarDatos(){
        echo "Esta persona es {$this->nombre} {$this->apellidos}, con numero de telefono {$this->numTelefono}<br>";     
    }

    public function __destruct(){
        echo "Se está destruyendo el objeto con nombre {$this->nombre}<br>";
    }
}
?>