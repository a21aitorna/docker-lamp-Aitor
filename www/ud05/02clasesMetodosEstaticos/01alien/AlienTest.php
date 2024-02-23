<?php

include 'Alien.php';

// Crear varios objetos de Alien
$alien1 = new Alien('Carl');
$alien2 = new Alien('Marl');
$alien3 = new Alien('Sarl');

// Mostrar el valor devuelto por el método getNumberOfAliens
echo "Número de aliens creados: " . Alien::getNumberOfAliens() . "\n";

// Crear más aliens
$alien4 = new Alien('Gork');
$alien5 = new Alien('Blip');

// Mostrar el nuevo valor después de crear más aliens
echo "Número de aliens creados: " . Alien::getNumberOfAliens() . "\n";

?>
