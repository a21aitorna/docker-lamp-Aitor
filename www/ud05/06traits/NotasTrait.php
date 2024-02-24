<?php

include 'CalculosCentroEstudios.php';
include 'MostrarCalculos.php';

class NotasTrait {
    use CalculosCentrosEstudios, MostrarCalculos;

    public function procesarNotas($notas) {
        $aprobados = $this->numeroDeAprobados($notas);
        $suspendos = $this->numeroDeSuspensos($notas);
        $promedio = $this->notaMedia($notas);

        $this->saludo();
        $this->showCalculusStudyCenter($aprobados, $suspendos, $promedio);
    }
}

// Ejemplo de uso
$notasTraitObj = new NotasTrait();
$notas = [8,8,0];
$notasTraitObj->procesarNotas($notas);
