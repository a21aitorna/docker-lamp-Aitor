<?php
    class ExcepcionPropiaClase {
        public static function testNumber($numero) {
            if ($numero === 0) {
                throw new ExcepcionPropia("El número no puede ser cero.");
            }
        }
    }
    

?>