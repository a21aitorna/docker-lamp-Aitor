<?php 

/*
    include(): sirve para incluír e interpretar el contenido de un fichero a otro.
    include_once: tiene la misma funcionalidad que include() con la diferencia que si el fichero se había incluido, no se vuelve a incluir.
    require(): tiene la misma funcionalidad que include() con la diferencia que en caso de fallo se produce un error fatal.
    require_once: tiene la misma funcionalidad que require() con la diferencia que si el fichero se había incluido, no se vuelve a incluir.
*/

//Indicar si es digito entre 0 y 9
function esDigito($a){
    if(is_integer($a)){
        $respuesta= ($a>=0 && $a<=9) ? "El numero esta entre 0 y 9": $respuesta="El numero no esta entre 0 y 9";
    }
    else
        $respuesta="El caracter no es un numero";    
    return $respuesta."<br>";
}

//Devolver longitud string
function devolverLongitud($s){
    if(is_string($s))
        $respuesta =  strlen($s);
    else
        $respuesta = "No es un string";
    return $respuesta;
}

//Potencia de a elevado a b
function potencia($a, $b){
    if(is_numeric($a) && is_numeric($b)){
        $respuesta = $a."<sup>".$b."</sup>=".pow($a,$b);
    }
    else{
        $respuesta = "Uno de los valores no es numerico";
    }
    return $respuesta;
}

//Ver si es vocal
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

//Calcular numero par o impar
function esParImpar($numero){
    if(is_integer($numero) || is_float($numero)){
        $resto = $numero%2;
        $respuesta = ($resto==0) ? "El numero es par" : "El numero es impar";
    }
    else
        $respuesta = "No es un numero";
    return $respuesta;
}
    

//Devolver string en mayusculas
function enMayusculas($s){
    $respuesta = is_string($s) ? strtoupper($s) : "No es un string";
    return $respuesta;
}

//Imprimir zona horaria
function zonaHoraria(){
    $zonaHoraria = date_default_timezone_get();
    echo "Mi zona horaria es ".$zonaHoraria."<br>";
}
    
//Calcular salida y puesta de sol
function salePoneSol(){
    $fecha = time();
    $latitud = ini_get("date.default_latitude");
    $longitud = ini_get("date.default_longitude");
    $zenith = ini_get("date.default_zenith");
    $gmt_offset = 1;
echo "El sol sale a las ". date_sunrise($fecha, SUNFUNCS_RET_STRING, $longitud, $latitud, $zenith, $gmt_offset)." y se pone a las ".date_sunset($fecha, SUNFUNCS_RET_STRING, $longitud, $latitud,$zenith, $gmt_offset);
      
}

//Comprobar NIF
function comprobar_nif($dni){
    $letra = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
    if(strlen($dni)==9){
        $dniMayuscula = strtoupper($dni);
        $dniNum = substr($dni,0,8);
        $dniLetra = substr($dni,8,9);
        $modulo = $dniNum%23;
        $dniValido = ($dniLetra == $letra[$modulo]) ? true : false;
        return $dniValido;
    }
    else{
        echo "El dni no es valido";
    }
}


?>

