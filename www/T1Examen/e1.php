<?php
    $arrayCualquiera = [4, 7, 4.5, "hola"];
    $arrayResultado= [];

    function esPar($array){
        // foreach($array as $elemento){
        echo("Comprobacion pares<br>");
        for($i=0;$i<count($array);$i++){
            if(is_integer($array[$i])){
               $resultado = ($array[$i]%2==0 ? "true":"false");  
            }
            else{
                $resultado = "false";
            }   
            
            $arrayResultado[$i] = $resultado;
        }
        echo("[");
        foreach($arrayResultado as $resultadoArray){
            
            echo($resultadoArray.",");
        }
        echo("]<br><br>");
        
        
    }

    function esImpar($array){
        echo("Comprobacion impares<br>");
        for($i=0;$i<count($array);$i++){
            if(is_integer($array[$i])){
               $resultado = ($array[$i]%2!=0 ? "true":"false");  
            }
            else{
                $resultado = "false";
            }   
            
            $arrayResultado[$i] = $resultado;
        }
        echo("[");
        foreach($arrayResultado as $resultadoArray){
            
            echo($resultadoArray.",");
        }
        echo("]<br><br>");
    }
?>