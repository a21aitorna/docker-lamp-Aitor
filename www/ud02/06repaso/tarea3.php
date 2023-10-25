<?php
/*Utilizando el  código HTML
Crear un programa para mostrar los siguientes resultados en PHP:
    Números recibidos por método POST: num1, num2, num3, num4,
    Suma total de los números: xxx
    Multiplicación de lo números: xxx
    Division entre el primer y tercer número: xxx
    Resto entre num1 y num2: xxx
    ¿El primer número es mayor que el tercero? Si o No.*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Calculadora</title>
<style>
label
{
    width: 4em;
    float: left;
    text-align: right;
    margin-right: 0.5em;
    display: block;
}

.submit input
{
    margin-left: 4.5em;
}
input
{
    color: #781351;
    background: #fee3ad;
    border: 1px solid #781351;
    width: 40px;
}

input.submit
{
    color: #000;
    background: #ffa20f;
    border: 2px outset #d7b9c9;
    width: 90px;
}
fieldset
{
    border: 1px solid #781351;
    width: 20em
}

legend
{
    color: #fff;
    background: #ffa20c;
    border: 1px solid #781351;
    padding: 2px 6px;
}
</style>
</head>
<body>
<form name="formulario" method="post" action="">
<fieldset>
<legend>Calculadora</legend>
    <p><label for="campo1">Núm 1:</label><input name="campo1" value="" /></p>
    <p><label for="campo2">Núm 2:</label><input name="campo2" value="" /></p>
    <p><label for="campo3">Núm 3:</label><input name="campo3" value="" /></p>
    <p><label for="campo4">Núm 4:</label><input name="campo4" value="" /></p>
    <input type="submit" class="submit" name="enviar" value="Calcular" />
</fieldset>
</form>

<?php
    if(isset($_POST['enviar'])){
        // //Campo1
        // if(isset($_POST['campo1']) && !empty($_POST['campo1']) && is_numeric($_POST['campo1'])){
        //     $num1 = $_POST['campo1'];
        // }
        // else
        //     echo("El campo 1 debe ser numerico y no estar vacio");
        // //Campo2
        // if(isset($_POST['campo2']) && !empty($_POST['campo2']) && is_numeric($_POST['campo2'])){
        //     $num2 = $_POST['campo2'];
        // }
        // else
        //     echo("El campo 2 debe ser numerico y no estar vacio");
        // //Campo3
        // if(isset($_POST['campo3']) && !empty($_POST['campo3']) && is_numeric($_POST['campo3'])){
        //     $num3 = $_POST['campo3'];
        // }
        // else
        //     echo("El campo 3 debe ser numerico y no estar vacio");
        // //Campo4
        // if(isset($_POST['campo4']) && !empty($_POST['campo4']) && is_numeric($_POST['campo4'])){
        //     $num4 = $_POST['campo4'];
        // }
        // else
        //     echo("El campo 4 debe ser numerico y no estar vacio");
        $num1 = realizarValidaciones('campo1', 'Núm 1');
        $num2 = realizarValidaciones('campo2', 'Núm 2');
        $num3 = realizarValidaciones('campo3', 'Núm 3');
        $num4 = realizarValidaciones('campo4', 'Núm 4');

        if($num1 !== null && $num2 !== null && $num3 !== null && $num4 !== null){
            verNumeros($num1, $num2, $num3, $num4);
            sumaNumeros($num1, $num2, $num3, $num4);
            multiplicacionNumeros($num1, $num2, $num3, $num4);
            divisionNumero($num1, $num3);
            restoNumero($num1,$num2);
            compararNumero($num1, $num3);
        }
        
    }

    function realizarValidaciones($campo, $num){
        if(isset($_POST[$campo]) && !empty($_POST[$campo]) && is_numeric($_POST[$campo])){
            return $num = $_POST[$campo];
        }
        else{
            echo("El $campo debe ser numerico y no estar vacio <br>");
            return null;
        }
            
    }

    function verNumeros($num1, $num2, $num3, $num4){
        echo("Los numeros son $num1, $num2, $num3 y $num4 <br>");
    }

    function sumaNumeros($num1, $num2, $num3, $num4){
        $suma = $num1+$num2+$num3+$num4;
        echo("$num1+$num2+$num3+$num4=$suma<br>");
    }
    function multiplicacionNumeros($num1, $num2, $num3, $num4){
        $multiplicacion = $num1*$num2*$num3*$num4;
        echo("$num1*$num2*$num3*$num4=$multiplicacion<br>");
    }
    function divisionNumero($num1, $num2){
        $division = $num1/$num2;
        echo("$num1/$num2=$division<br>");
    }
    function restoNumero($num1,$num2){
        $resto=$num1%$num2;
        echo("$num1%$num2=$resto<br>");
    }

    function compararNumero($num1, $num2){
        echo("¿El primer número es mayor que el tercero? ");
        if($num1>$num2)
            echo("Sí<br>");
        else
            echo "No<br>";
    }
?>
</body>
</html>