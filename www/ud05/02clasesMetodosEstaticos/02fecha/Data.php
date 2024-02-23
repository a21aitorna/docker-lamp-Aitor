<?php
    // class Data
    // {
    //  public static $calendario = "Calendario gregoriano";
    
    //  public static function getData()
    //  {
    //  $ano = date('Y'); //Nos da el año actual 
    //  $mes = date('m');
    //  $dia = date('d');
    //  return $dia . '/' . $mes . '/' . $ano;
    //  }
    // }
    class Data{
        private static $calendario="Calendario gregoriano";
        private static $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado','Domingo'];
        private static $meses = [1 => 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        public static function getCalendar(){
            return self::$calendario;
        }
        public static function getHora(){
            return date('H:i:s');
        }
        public static function getData(){
            $ano = date('Y');
            $mes = intval(date('m'));
            $dia = date('d');
            $diaSemana = date('w');
            return self::$dias[$diaSemana]." ".$dia." de ".self::$meses[$mes]." del ". $ano;
        }

        public static function getDataHora(){
            echo "Usamos el calendario: ". self::getCalendar()."<br>";
            echo "Hoy es ". self::getData()." y son las ". self::getHora()."<br>";
        }

    }

?>