<?php
class Empleado {

    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados = 0;

    public function __construct($nombre, $salario){
        $this->nombre=$nombre;
        $this->salario= ($salario<=2000) ? $salario : 2000;
        self::$numEmpleados++;
    }

    //MÉTODOS
    public function setNombre($nombre) {
        $this->nombre=$nombre;  
    }
    public function get_nombre(){
        return $this->nombre;
    }

    public function get_salario(){
        return $this->salario;
    }

    public static function get_numEmpleados(){
        return self::$numEmpleados;
    }
}


?>