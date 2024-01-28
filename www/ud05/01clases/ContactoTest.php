<?php
include 'Contacto.php';

$contacto1 = new Contacto("Aitor", "Novoa Alonso", 666666666);
$contacto2 = new Contacto("Pepe", "Alvarez Gonzalez", 689879564);
$contacto3 = new Contacto("Juan", "Davila", 987456123);

echo "Usando getters <br>";
echo "Esta persona es {$contacto1->get_nombre()} {$contacto1->get_apellidos()}, con numero de telefono {$contacto1->get_numTelefono()}<br>";
echo "Esta persona es {$contacto2->get_nombre()} {$contacto2->get_apellidos()}, con numero de telefono {$contacto2->get_numTelefono()}<br>";
echo "Esta persona es {$contacto3->get_nombre()} {$contacto3->get_apellidos()}, con numero de telefono {$contacto3->get_numTelefono()}<br><br>";

echo "Usando metodo mostrarDatos()<br>";
$contacto1->mostrarDatos();
$contacto2->mostrarDatos();
$contacto3->mostrarDatos();
echo "<br>";
?>