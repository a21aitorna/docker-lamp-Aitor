<?php
    //Tuve que cambiar el nombre del trait porque sino se confundía con la interfaz anteriormente
    trait CalculosCentrosEstudios {
        public function numeroDeAprobados($notas) {
            $aprobados = 0;
    
            foreach ($notas as $nota) {
                if ($nota >= 5) {
                    $aprobados++;
                }
            }
    
            return $aprobados;
        }
    
        public function numeroDeSuspensos($notas) {
            $suspendos = 0;
    
            foreach ($notas as $nota) {
                if ($nota < 5) {
                    $suspendos++;
                }
            }
    
            return $suspendos;
        }
    
        public function notaMedia($notas) {
            $totalNotas = count($notas);
    
            if ($totalNotas === 0) {
                return 0; // Evitar división por cero
            }
    
            $sumaNotas = array_sum($notas);
            $promedio = $sumaNotas / $totalNotas;
    
            return round($promedio, 2); // Redondear a dos decimales
        }
    }

?>