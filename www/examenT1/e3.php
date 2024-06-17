<?php

    // function imprimirTabla($coches){
    //     echo "<table><tr>
    //         <th>Marca</th>
    //         <th>Stock</th>
    //         <th>Ventas</th>
    //         </tr>";
    //     foreach($coches as $coche=>$datos_coches){
    //         $marca = $coche[0];
    //         $stock = $coche[1];
    //         $ventas = $coche[2];
    //         var_dump($marca);
    //         if(strlen($marca)>4 && $ventas>10){
    //             echo "<tr>
    //                 <td>$marca</td>
    //                 <td>$stock</td>
    //                 <td>$ventas</td>
    //             </tr>";
    //         }
    //     }
    //     echo "</table>";
    // }

    function imprimirTabla($coches){
        echo "<table><tr>
            <th>Marca</th>
            <th>Stock</th>
            <th>Ventas</th>
            </tr>";
        foreach($coches as $marca=>$datos_coches){
            $stock = $datos_coches['stock'];
            $ventas = $datos_coches['ventas'];
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