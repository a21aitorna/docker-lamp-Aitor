<?php

trait MostrarCalculos {
    public function saludo() {
        echo "Bienvenido al centro de cálculo\n";
    }

    public function showCalculusStudyCenter($aprobados, $suspendos, $promedio) {
        echo "Número de aprobados: $aprobados\n";
        echo "Número de suspendos: $suspendos\n";
        echo "Nota media: $promedio\n";
    }
}
