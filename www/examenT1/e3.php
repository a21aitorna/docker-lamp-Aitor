<?php

    function imprimirTabla($coches){
        echo "<table><tr>
            <td>Marca</td>
            <td>Stock</td>
            <td>Ventas</td>
            </tr>";
        foreach($coches as $coche){
            $marca = $coche[0];
            $stock = $coche[1];
            $ventas = $coche[2];
            if(strlen($marca)>4 && $ventas>10){
                echo "<tr>
                    <td>$marca</td>
                    <td>$stock</td>
                    <td>$ventas</td>
                </tr>";
            }
        }
        echo "</table>";
    }

?>