<?php
    /*
    Escribir un programa que lea la entrada de la hora de un día en notación 24 horas y muestre la respuesta en notación de 12 horas. 
    Por ejemplo, si introducimos 18:05 debe proporcionar como salida 06:05 PM.
    */

    function calcularDoceHoras($hora){
        list($horas, $minutos) = explode(":", $hora);
        $am = ($horas<12) ? "AM" : "PM";
        switch($horas){
            case 0: 
                $hora_12="12:$minutos $am";
                break;
            case ($horas<=12):
                $hora_12="$horas:$minutos $am";
                break;
            case ($hora>12):
                $horaCambiada = $horas-12;
                $hora_12= "$horaCambiada:$minutos $am";
                break;
        }
        echo("La hora $hora en notacion de 12 horas es $hora_12");
    }

    calcularDoceHoras("9:56");
?>