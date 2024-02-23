<?php
include 'Empleados.php';

class Operario extends Empleado{

    private $turno;

    public function __construct($nombre, $salario, $turno){
        parent::__construct($nombre, $salario);
        $this->turno = $turno;
    }

    public function set_turno($turno){
        if($turno==='diurno' || $turno ==='nocturno'){
            $this->turno = $turno;
        }
        else{
            throw new InvalidArgumentException("El turno solo puede ser diurno o nocturno.");
        }
    }
}

?>