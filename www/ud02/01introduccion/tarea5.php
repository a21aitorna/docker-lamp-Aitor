<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/

    echo"<h3>Calcular temperatura celsius</h3>";
    $temperaturaFahrenheit=100;
    $temperaturaCelsius=($temperaturaFahrenheit-32)*5/9;
    echo ($temperaturaCelsius);
    echo "<br><br>"; 


/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.*/

    //- Guarda los resultados en nuevas variables.
    echo"<h3>Calcular con variables intermedias</h3>";
    $x=20;
    $y=10;
    $suma = $x+$y;
    $resta = $x-$y;
    $multiplicacion = $x*$y;
    $division = $x/$y;
    $modulo = $x%$y;
    echo ("La suma es ".$suma.", la resta es ".$resta.", la multiplicacion es ".$multiplicacion.", la division es ".$division." y el modulo es ".$modulo); 
    echo "<br>";

    //- Sin utilizar variables intermedias. 
    echo"<h3>Calcular sin variables intermedias</h3>";
    $x=20;
    $y=10;
    echo ("La suma es ". $x+$y." ,la resta es ". $x-$y." ,la multiplicacion es " .$x*$y." ,la division es ". $x/$y ." y el modulo es ".$x%$y); 
    echo "<br>";


/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/ 

    echo"<h3>Calcular cuadrados 30 primeros numeros</h3>";
    for ($i = 1; $i <= 30; $i++) {
        $cuadrado = $i * $i;
        echo ($i."<sup>2</sup>=".$cuadrado."<br>");
    }


/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */
    echo"<h3>Calcular area y perimetro</h3>";
    $base = 20;
    $altura = 10;
    $area = $base*$altura;
    $perimetro = 2*$base+2*$altura;
    echo("La area del rectangulo es ".$area. " y el perimetro es ".$perimetro);
?>

