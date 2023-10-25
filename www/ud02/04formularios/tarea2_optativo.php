<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
    <table>
        <thead>
            <th>Bebida</th>
            <th>PVP</th>
        </thead>
        <tbody>
            <tr>
                <td>CocaCola</td>
                <td>1€</td>
            </tr>
            <tr>
                <td>PepsiCola</td>
                <td>0,80€</td>
            </tr>
            <tr>
                <td>Fanta Naranja</td>
                <td>0,90€</td>
            </tr>
            <tr>
                <td>Trina manzana</td>
                <td>1,10€</td>
            </tr>
        </tbody>
    </table>

    <div>
    <!-- Aquí va el formulario-->
        <form action="tarea2_optativo.php" method="POST">
            <label for="opcion">Seleccion de bebida</label><br>
            <select name="opcion" required>
                <option value="vacio" selected></option>
                <option value="cocacola">CocaCola</option>
                <option value="pepsi">Pepsi</option>
                <option value="fanta">Fanta</option>
                <option value="trina">Trina</option>
            </select><br>
            <label for="cantidad">Selecciona la cantidad</label>
            <input type="number" name="cantidad" autocomplete="off" required><br>
            <button type="submit" name="enviar">Solicitar</button>
        </form>
    </div>
<?php 
/*
Crea un formulario para solicitar una de las siguientes bebidas:

    Bebida|PVP
    :-|:-:
    Coca Cola|1 €
    Pepsi Cola|0,80 €
    Fanta Naranja|0,90 €
    Trina Manzana|1,10 €
    
    A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
    La aplicación mostrará algo como:

    Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
    Puedes utilizar sentencias `switch` o `if`.
    */

    //Aquí va el código PHP que muestra la información solicitada.
    if(isset($_POST['enviar'])){
        $bebida = $_POST['opcion'];
        $cantidad = $_POST['cantidad'];
        switch($bebida){
            case "cocacola":
                $precio = 1;
                break;
            case "pepsi":
                $precio = 0.8;
                break;
            case "fanta":
                $precio = 0.9;
                break;
            case "trina":
                $precio = 1.1;
                break;
        }
        $precioTotal = $cantidad*$precio;
        echo "Has pedido ".$cantidad." botellas de ".$bebida.". Precio total a pagar: ".$precioTotal." Euros.";
    }
?>
</body>
</html>