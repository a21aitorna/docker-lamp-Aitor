<?php

/*Haz una página que ejecute la función phpinfo() y que muestre las principales variables de servidor mencionadas en teoría.
*/

phpinfo();
//Para poder ver las variables hay que comentar la línea previa. Como había bastantes y en la teoría no se mencionaba exactamente cuáles usar, opté por las que considero más importantes. 

//Muestra el nombre del servidor
echo($_SERVER["SERVER_NAME"]);
//Muestra la direccion IP
echo($_SERVER["SERVER_ADDR"]);
//Muestra el puerto del servidor
echo($_SERVER["SERVER_PORT"]);
//Muestra la direccion del script.
echo($_SERVER["SCRIPT_FILENAME"]);
//Muestra qué tipo de método se está usando
echo($_SERVER["REQUEST_METHOD"]);
?>