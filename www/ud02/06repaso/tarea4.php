<?php
    //Crea unha estrutura de datos para almacenar a seguinte información:
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        table thead {
            background-color: #333;
            color: black;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Nombre</th>
                <th>Precio</t>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>cocacola</td>
                <td>Coca Cola</td>
                <td>2.1</td>
            </tr>
            <tr>
                <td>pepsicola</td>
                <td>Pepsi Cola</td>
                <td>2</td>
            </tr>
            <tr>
                <td>fantanaranja</td>
                <td>Fanta Naranja</td>
                <td>2.5</td>
            </tr>
            <tr>
                <td>trinamanzana</td>
                <td>Trina Manzana</td>
                <td>2.3</td>
            </tr>
        </tbody>
    </table>

    <?php
        echo"<br>";
        /*Coa estrutura de datos creada anteriormente, xerar un select dinámico que dea como resultado o seguinte:
            
            <select name="opcion">
                <option value="cocacola">Coca Cola (2.1 €)</option>
                <option value="pepsicola">Pepsi Cola (2 €)</option>
                <option value="fantanaranja">Fanta Naranja (2.5 €)</option>
                <option value="trinamanzana">Trina Manzana (2.3 €)</option>
            </select>*/
        
        $bebidas = [
            'cocacola'=>[
                'nombre'=>'Coca Cola',
                'precio'=>2.1
            ],
            'pepsicola' => [
                'nombre' => 'Pepsi Cola', 
                'precio' => 2
            ],
            'fantanaranja' => [
                'nombre' => 'Fanta Naranja', 
                'precio' => 2.5
            ],
            'trinamanzana' => [
                'nombre' => 'Trina Manzana', 
                'precio' => 2.3
            ]
        ];
    ?>
   <select name="opcion">
    <?php foreach ($bebidas as $bebida => $producto) : ?>
        <option value="<?php echo $bebida; ?>"><?php echo $producto['nombre'] . ' (' . $producto['precio'] . ' €)'; ?></option>
    <?php endforeach; ?>
</body>
</html>