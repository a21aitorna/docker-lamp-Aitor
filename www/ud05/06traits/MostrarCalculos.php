<?php

trait MostrarCalculos {
    public function saludo() {
        echo "Bienvenido al centro de cálculo\n";
    }

    public function showCalculusStudyCenter($aprobados, $suspendos, $promedio) {
        echo "Número de aprobados: $aprobados<br>";
        echo "Número de suspendos: $suspendos<br>";
        echo "Nota media: $promedio<br>";
    }
}
