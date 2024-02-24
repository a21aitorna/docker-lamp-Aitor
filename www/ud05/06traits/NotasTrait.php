<?php

include 'CalculosCentroEstudios.php';
include 'MostrarCalculos.php';

class NotasTrait {
    use CalculosCentrosEstudios, MostrarCalculos;

    public function procesarNotas($notas) {
        $aprobados = $this->numeroDeAprobados($notas);
        $suspendos = $this->numeroDeSuspensos($notas);
        $media = $this->notaMedia($notas);

        $this->saludo();
        $this->showCalculusStudyCenter($aprobados, $suspendos, $media);
    }
}

$nota1 = rand(0,10);
$nota2 = rand(0,10);
$nota3 = rand(0,10);
$nota4 = rand(0,10);
$nota5 = rand(0,10);

$notasTrait = new NotasTrait();
$notas = [$nota1, $nota2, $nota3, $nota4, $nota5];
foreach ($notas as $nota){
    echo "$nota, ";
}
echo "<br>";

$notasTrait->procesarNotas($notas);
