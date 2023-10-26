<?php
    /*
    1. ¿Cuál es el resultado de las siguientes expresiones?. Comprueba el resultado.
        70 * 10 – 5 % 3 * 4 + “9” => el resultado será 701
        (( 5 + 3) / 2 * 3) / 2 - (int) 28.75 / 4 + 29 % 3 * 4 => el resultado será 7
        $r =’C’ – (double) 5 / 2 + 3.5 + 0.4 (Nota ‘C’ é o ascii: 67) => tecnicamente debería dar 68,4 pero da fallo
    */


    /*
    2. Indica cuál sería la salida del siguiente programa:
        $m = 99;
        $n = ++$m;
        echo “m = $m, n = $n\n”;
        $n = $m++;
        echo “m = $m, n = $n\n”;
        printf(“m = %d \n”, $m++); // printf é unha func. de C para imprimir que se pode empregar en PHP.
        printf(“m = %d \n”,++$m);

        La salida es la siguiente:
        m=100, n=100 m=101, n=100 m=101 m=103 
    */


    /*
    3. Indica cuál sería la salida del siguiente programa:
        $n = 5;
        $t = ++$n * --$n;
        echo “n = $n, t = $t\n”;
        printf(“%d %d %d”, ++$n, ++$n, ++$n);

        La salida es la siguiente:
        n=5, t=30 6 7 8
    */

    // 4. Escribe un programa que calcule el factorial de un número.

    function calcularFactorial($numero){
        if($numero ==0) 
            return 1;
        else 
            return $numero * calcularFactorial($numero-1);
    }
    $numero = 6; //Introduce el numero que quieras
    echo("El factorial de $numero es " . calcularFactorial($numero));
    echo"<br><br><br>";
?>
<?php
    // 5. Escribir una página web que dados unos segundos (recogidos en un formulario) exprese su equivalente en semanas, días, horas, minutos y segundos.
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST">
            <label for="name">Introduce el tiempo en segundos</label>
            <input type="number" name="segundos" required><br>
            <button type="submit" name="calcular">Calcular</button>
        </form>
        <?php
            if(isset($_POST['calcular'])){
                $segundos = $_POST['segundos'];
                //Calcular semanas
                $semanas = floor($segundos/604800);
                $segundos%=604800;
                //Calcular dias
                $dias= floor($segundos/86400);
                $segundos%= 86400;
                //Calcular horas
                $horas = floor($segundos / 3600);
                $segundos %= 3600;
                //Calcular minutos
                $minutos = floor($segundos / 60);
                $segundos %= 60;

                echo("Los segundos introducidos equivalen a $semanas semanas, $dias dias, $horas horas, $dias dias, $horas horas, $minutos minutos y $segundos segundos");
            }
        ?>
    </body>
    </html>  


<?php
echo("<br><br><br>");
    /*6. El domingo de pascua es el primer domingo después de la primera luna llena posterior al equinoccio de primavera y se determina mediante 
    el siguiente cálculo sencillo:
    A = anho mod 19 B = anho mod 4 C = anho mod 7 D = (19 * A + 24) mod 30 E = (2 * B + 4 * C + 6 * D + 5) mod 7 N = (22 + D + E)

    Donde N indica el número de día del mes de marzo (si N es igual o menor que 31) o abril (si es mayor que 31). Contruir un programa que determina las fechas de domingos 
    de pascua dado el año. Nota: Emplea únicamente las variables anho, d y n.
    */
    /*$A = $anho%19;
    $B = $anho%4;
    $C = $anho%7;
    $D = (19*$A+24)%30;
    $E = (2*$B+4*$C+6*$D+5)%7;
    $N = 22+$D+$E;
    */

    function calcularDomingoPascua($anho){
        $D = (19*($anho%19)+24)%30;
        $N = 22+ $D+((2*($anho%4)+4*($anho%7)+6*$D+5)%7);
        if($N<=31){
            echo "El domingo de Pascua del año $anho es el ".($N)." de marzo";
        }
        else{
            echo "El domingo de Pascua del año $anho es el ".($N-31)." de abril";
        }
    }
    calcularDomingoPascua(2024);
   
?>