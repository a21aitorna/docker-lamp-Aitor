<?php

function esPar($array){
    $result = array();
    foreach($array as $value){
        if(is_numeric($value)){
            $result[] = ($value%2 == 0);
        }
        else{
            $result[]=false;
        }
    }
    return $result;
}


function esImpar($array){
    $result = array();
    foreach($array as $value){
        if(is_numeric($value)){
            $result[] = ($value %2 != 0);
        }
        else{
            $result[]=false;
        }
    }
    return $result;
}

?>