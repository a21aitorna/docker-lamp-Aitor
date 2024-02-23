<?php

include 'Alien.php';

$alien1 = new Alien('Carl');
$alien2 = new Alien('Marl');
$alien3 = new Alien('Sarl');

echo "Número de aliens creados: " . Alien::getNumberOfAliens();

?>
