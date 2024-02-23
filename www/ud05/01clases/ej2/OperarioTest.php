<?php
require_once 'Operario.php';

//TENGO QUE COMENTAR LAS LINEAS DE OPERARIO1, PARA QUE NO ME DE EL ERROR PERSONALIZADO QUE PUSE
// $operario1 = new Operario("Aitor", 2520, "ready");
$operario2 = new Operario("Aitor", 2520, "diurno");
$operario3 = new Operario("Aitor", 2520, "nocturno");

//DATOS INICIALES OPERADOR
echo "OPERARIOS ORGINALES<br>";
// echo "El salario de {$operario1->get_nombre()} es {$operario1->get_salario()} y el turno es {$operario1->get_turno()}<br> ";
echo "El salario de {$operario2->get_nombre()} es {$operario2->get_salario()} y el turno es {$operario2->get_turno()}<br> ";
echo "El salario de {$operario3->get_nombre()} es {$operario3->get_salario()} y el turno es {$operario3->get_turno()}<br><br> ";

//DATOS MODIFICADOS OPERADOR
echo "OPERARIOS MODIFICADPS<br>";
// $operario2->setNombre('Jose');
// $operario2->set_turno('libre');
$operario3->setNombre('Paco');
$operario3->set_turno('diurno');
// echo "El salario de {$operario2->get_nombre()} es {$operario2->get_salario()} y el turno es {$operario2->get_turno()}<br> ";
echo "El salario de {$operario3->get_nombre()} es {$operario3->get_salario()} y el turno es {$operario3->get_turno()}<br> ";

?>