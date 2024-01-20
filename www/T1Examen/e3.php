<?php
    $coches = array(
        array("Volvo", 22, 18),
        array("BMW", 15, 13),
        array("Saab", 5, 2),
        array("Land Rover", 17, 15),
    );

    
?>



        <?php
        function imprimirTabla($coches){

            foreach($coches as $coche=>$datos){
                echo($coches);
                foreach($datos as $dato=>$contenido){
                    echo("Datos: ".$dato. "Contenido: ".$contenido);
                }
            }
        }
        imprimirTabla($coches);
        ?>

