<?php

require_once 'NotaDaw.php';

$nota1 = rand(0,10);
$nota2 = rand(0,10);
$nota3 = rand(0,10);
$nota4 = rand(0,10);
$nota5 = rand(0,10);

$notasDaw = new NotasDaw([$nota1, $nota2, $nota3, $nota4, $nota5]);

echo "Lista de notas: " . $notasDaw->toString()."<br>";
echo "Número de aprobados: " . $notasDaw->numeroDeAprobados()."<br>";
echo "Número de suspensos: " . $notasDaw->numeroDeSuspensos()."<br>";
echo "Nota media: " . $notasDaw->notaMedia();