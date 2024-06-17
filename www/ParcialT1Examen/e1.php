<?php

    function contarVocales($stringCualquiera){
        $vocales=0;
        $stringCualquiera=strtolower($stringCualquiera);
        for($i=0;$i<strlen($stringCualquiera);$i++){
            // if($stringCualquiera[$i]=='a'){//||$stringCualquiera[$i]='e'||$stringCualquiera[$i]='i'||$stringCualquiera[$i]='o'||$stringCualquiera[$i]='u'||$stringCualquiera[$i]='A'||$stringCualquiera[$i]='E'||$stringCualquiera[$i]='I'||$stringCualquiera[$i]='O'||$stringCualquiera[$i]='U'){
            if(in_array($stringCualquiera[$i],['a','e','i','o','u'])){
                $vocales++;
            } 
        }
        return $vocales;
    }

    function obtenerVocales($stringCualquiera){
        $vocalesPresentes = array();
        $vocalesDisponibles = array('a','e','i','o','u','A','E','I','O','U');
        for($i=0;$i<strlen($stringCualquiera);$i++){
            if(in_array($stringCualquiera[$i],$vocalesDisponibles)){
                foreach($vocalesDisponibles as $vocal){
                    if($stringCualquiera[$i]==$vocal){
                        array_push($vocalesPresentes, $vocal);
                    }
                }
                
            }
        }
        return $vocalesPresentes;

    }
?>