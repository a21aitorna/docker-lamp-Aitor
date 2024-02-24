<?php

require_once 'CalculosCentro.php';
require_once 'Nota.php';

class NotasDaw extends Notas implements CalculosCentroEstudios {
    public function numeroDeAprobados() {
        $aprobados = array_filter($this->notas, function ($nota) {
            return $nota >= 5;
        });
        return count($aprobados);
    }

    public function numeroDeSuspensos() {
        $suspendidos = array_filter($this->notas, function ($nota) {
            return $nota < 5;
        });
        return count($suspendidos);
    }

    public function notaMedia() {
        $totalNotas = count($this->notas);
        if ($totalNotas === 0) {
            return 0;
        }

        $sumaNotas = array_sum($this->notas);
        return $sumaNotas / $totalNotas;
    }

    public function toString() {
        $listaDeNotas = "";
        foreach ($this->getNotas() as $nota) {
            $listaDeNotas .= "$nota, ";
        }
        return $listaDeNotas;
    }
}
