<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
    function esDigito($a){
        if(is_integer($a)){
            $respuesta= ($a>=0 && $a<=9) ? "El numero esta entre 0 y 9": $respuesta="El numero no esta entre 0 y 9";
        }
        else
            $respuesta="El caracter no es un numero";    
        return $respuesta."<br>";
        // $respuesta = (is_integer($a) && $a>=0 && $a<=9) ? "El numero esta entre 0 y 9": "El numero no esta entre 0 y 9 o el caracter no es un numero";
        // return $respuesta;
    }
    echo(esDigito(6));

// 2. Crea una función que reciba un string e devolva a súa lonxitude.
    function devolverLongitud($s){
        if(is_string($s))
            $respuesta =  strlen($s);
        else
            $respuesta = "No es un string";
        return $respuesta;
    }
    echo(devolverLongitud("Bienvenido")."<br>");

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
    function potencia($a, $b){
        if(is_numeric($a) && is_numeric($b)){
            $respuesta = $a."<sup>".$b."</sup>=".pow($a,$b);
        }
        else{
            $respuesta = "Uno de los valores no es numerico";
        }
        return $respuesta;
    }
    echo(potencia(2,4))."<br>";

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
    function esVocal($letra){
        if(is_string($letra) && strlen($letra)==1){
            $letra=strtolower($letra);
            $vocales = ['a','e','i','o','u'];
            $respuesta = (array_search($letra, $vocales)) ?  True :  False;                
        }
        else{
            $respuesta = "No has introducido una letra";
        }
        return $respuesta;
    }

    $prueba = esVocal('a');
    //Esto fue una comprobación para ver si iba bien
    /*if($prueba==true){
        echo "Es vocal";
    }
    else{
        echo "No es vocal";
    }*/

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
    function esParImpar($numero){
        if(is_integer($numero) || is_float($numero)){
            $resto = $numero%2;
            $respuesta = ($resto==0) ? "El numero es par" : "El numero es impar";
        }
        else
            $respuesta = "No es un numero";
        return $respuesta;
    }
    echo(esParImpar(39.0)."<br>");

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
    function enMayusculas($s){
        $respuesta = is_string($s) ? strtoupper($s) : "No es un string";
        return $respuesta;
    }
    echo (enMayusculas("esta frase a mayusculas")."<br>");

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
    function zonaHoraria(){
        $zonaHoraria = date_default_timezone_get();
        echo "Mi zona horaria es ".$zonaHoraria."<br>";
    }
    zonaHoraria();

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
    function salePoneSol(){
        $fecha = time();
        $latitud = ini_get("date.default_latitude");
        $longitud = ini_get("date.default_longitude");
        $zenith = ini_get("date.default_zenith");
        $gmt_offset = 1;
    echo "El sol sale a las ". date_sunrise($fecha, SUNFUNCS_RET_STRING, $longitud, $latitud, $zenith, $gmt_offset)." y se pone a las ".date_sunset($fecha, SUNFUNCS_RET_STRING, $longitud, $latitud,$zenith, $gmt_offset);
      
    }
    salePoneSol();
    //No sale nada ya que los metodos date_sunrise y date_sunset están obsoletos
?>