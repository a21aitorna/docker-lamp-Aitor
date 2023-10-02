<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 
    echo "<h3>Ejercicio 1</h3>";
    for($i=0; $i<30;$i++){
        $matriz[$i] = rand(0,20);
    }
    foreach($matriz as $valor){
        echo $valor."<br/>";
    }
/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/
    echo "<h3>Ejercicio 2</h3>";
    $array = ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];
    foreach($array as $personaje){
        echo $personaje. ", ";
    }
    echo "<br>";
    //Eliminar ultima posicion del array
    array_pop($array);
    foreach($array as $personaje){
        echo $personaje. ", ";
    }
    echo "<br>";
    //Imprimir la posicion de superman
    echo "La posicion de superman es ". array_search("Superman", $array)."<br/>";
    foreach($array as $personaje){
        echo $personaje. ", ";
    }
    echo "<br>";
    //Agregar al final los elementos Carl, Lenny, Burns, Lisa
    array_push($array, "Carl", "Lenny", "Burns", "Lisa");
    foreach($array as $personaje){
        echo $personaje. ", ";
    }
    echo "<br>";
    //Ordenar los elementos de la matriz y mostrarla ordenada
    sort($array);
    foreach($array as $personaje){
        echo $personaje. ", ";
    }
    echo "<br>";
    //Agregar al principio Apple, Melon, Watermelon
    array_unshift($array, "Apple", "Melon", "Watermelon");
    foreach($array as $personaje){
        echo $personaje. ", ";
    }
    echo "<br>";


/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 
    //Consideré que el array que había que copiar era el ultimo resultante del ejercicio anterior, y que es desde la posicion 3 contantdo desde la 0
    echo "<h3>Tarea 3</h3>";
    $copia = array_slice($array, 3, 3);
    array_push($copia, "Pera");
    foreach($copia as $valor){
        echo $valor."<br/>";
    }

?>