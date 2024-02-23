<?php
include 'Empleados.php';

class Operario extends Empleado{

    private $turno;

    public function __construct($nombre, $salario, $turno){
        parent::__construct($nombre, $salario);
        $this->comprobarVariableTurno($turno);
    }


    public function get_turno(){
       return $this->turno;        
    }

    public function set_turno($turno){
        $this->comprobarVariableTurno($turno);
    }

    private function comprobarVariableTurno($turno){
        if ($turno !== "diurno" && $turno !== "nocturno") {
            throw new InvalidArgumentException("El valor de 'turno' debe ser 'diurno' o 'nocturno'.");
        }
        else{
            $this->turno = $turno;
        }
    }
}



?>