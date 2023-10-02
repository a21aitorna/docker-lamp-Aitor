<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea utilizando los valores contenidos en el array.
    $numerosPares = [];
    for($i=2; count($numerosPares)<10;$i+=2){
        $numerosPares[] = $i;
    }  
    foreach($numerosPares as $numero){
        echo $numero. "<br>";
    }
    echo("<br><br>");


/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
    $v[1]=90;
    $v[10] = 200;
    $v['hola']=43;
    $v[9]='e';
    foreach($v as $key => $valor){
        echo "Clave: ".$key.", Valor: ".$valor."<br>";
    }
?>