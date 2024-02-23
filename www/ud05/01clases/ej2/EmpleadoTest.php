<?php
include 'Empleados.php';

$empleado1 = new Empleado("Aitor", 1500);
$empleado2 = new Empleado("Pepe", 3200);

echo "EMPLEADOS ORGINALES<br>";
echo "El salario de {$empleado1->get_nombre()} es {$empleado1->get_salario()}<br>";
echo "El salario de {$empleado2->get_nombre()} es {$empleado2->get_salario()}<br><br>";

echo "EMPLEADOS MODIFICADOS<br>";
$empleado1->setNombre('Paco');
$empleado2->setNombre('Jose');
echo "El salario de ". $empleado1->get_nombre()." es ". $empleado1->get_salario(). "<br>";
echo "El salario de ".$empleado2->get_nombre()." es ". $empleado2->get_salario()."<br>";
$totalEmpleados = Empleado::get_numEmpleados();
echo "El numero de empleados es {$totalEmpleados}<br>";

?>