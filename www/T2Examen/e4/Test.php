<?php
include_once "Gato.php";
include_once "Perro.php";

$perro1 = new Perro("Pancho", 5);
print $perro1->obtenerNombre();
$perro1->emitirsonido();
echo "La edad del perro es ".$perro1->getEdad()."<br>";

$perro2 = new Perro("Chicho", 10);
print $perro2->obtenerNombre();
$perro2->emitirsonido();
echo "La edad del perro es ".$perro2->getEdad()."<br>";

$gato1 = new Gato("Misifu", 8);
print $gato1->obtenerNombre();
$gato1->emitirSonido();
echo "La edad del gato es ".$gato1->getEdad()."<br>";

$gato2 = new Gato("Kira", 4);
print $gato2->obtenerNombre();
$gato2->emitirSonido();
echo "La edad del gato es ".$gato2->getEdad()."<br>";

?>