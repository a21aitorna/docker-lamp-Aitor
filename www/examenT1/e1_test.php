<?php
    
require 'e1.php';

$array = array(4,7,4.5,4.0, "hola", array());

function imprimirArray($array){
    print "=======================<br>";
    foreach($array as $value){
        echo var_dump(($value));
    }
    print "=======================<br>";
}

imprimirArray(($array));
imprimirArray(esPar($array));
imprimirArray(esImpar($array));

?>