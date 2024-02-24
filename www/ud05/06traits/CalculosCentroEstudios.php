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
            $suspensos = 0;
    
            foreach ($notas as $nota) {
                if ($nota < 5) {
                    $suspensos++;
                }
            }
            return $suspensos;
        }
    
        public function notaMedia($notas) {
            $totalNotas = count($notas);
            if ($totalNotas === 0) {
                return 0; 
            }
    
            $sumaNotas = array_sum($notas);
            $promedio = $sumaNotas / $totalNotas;
    
            return round($promedio, 2); // Redondear a dos decimales
        }
    }

?>