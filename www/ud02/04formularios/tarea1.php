<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <!-- Aquí va el formulario-->
            <form action="tarea1.php" method="post">
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" placeholder="nombre"><br>
                <label for="apellidos">Apellidos</label><br>
                <input type="text" name="apellidos" placeholder="apellidos"><br>
                <input type="submit" name="enviar" value="Enviar">
            </form>
        </div>

            <div>
                <?php 

                    function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {                
                        $offset = strpos($haystack, $needle, $offset);
                        if($offset === false) {
                            return $results;            
                        } else {
                            $results[] = $offset;
                            return strpos_recursive($haystack, $needle, ($offset + 1), $results);
                        }
                    }
                    /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
                     * Nombre: `xxxxxxxxx`
                     *  Apellidos: `xxxxxxxxx`
                     * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
                     * Su nombre tiene caracteres `X`.
                     * Los 3 primeros caracteres de tu nombre son: `xxx`
                     * La letra A fue encontrada en sus apellidos en la posición: `X`
                     * Tu nombre en mayúsculas es: `XXXXXXXXX`
                     * Sus apellidos en minúsculas son: `xxxxxx`
                     * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
                     * Tu nombre escrito al revés es: `xxxxxx`
                    */
                    
                    //Aquí el código php que muestra la información solicitada.
                    if(isset($_POST['enviar'])){
                        $nombre = $_POST['nombre'];
                        $apellidos = $_POST['apellidos'];
                        echo "Nombre: ".$nombre."<br>";
                        echo "Apellidos: ".$apellidos."<br>";
                        echo "Nombre y apellidos: ".$nombre." ".$apellidos."<br>";
                        echo "Mi nombre tiene el siguiente numero de caracteres: ".strlen($nombre)."<br>";
                        echo "Los tres primeros caracteres de mi nombre son ".substr($nombre,0,3)."<br>";
                        echo "La letra a fue encontrada en mis apellidos en la posicion ".strpos($apellidos, "a")."<br>";
                        $encontrado = strpos_recursive($apellidos, 'a');
                        if($encontrado) {
                            foreach($encontrado as $pos) {
                                echo "La letra a fue encontrada en mis apellidos en la posicion ".$pos.'<br>';
                            }    
                        } 

                        echo "La letra A aparece en mi nombre ".substr_count($nombre, "A")."<br>";
                        echo "Mi nombre en mayusculas es ".strtoupper($nombre)."<br>";
                        echo "Mis apellidos en minusculas son ".strtolower($apellidos)."<br>";
                        echo "Mi nombre y apellidos en mayusculas son ".strtoupper($nombre)." ".strtoupper($apellidos)."<br>";
                        echo "Mi nombre escrito al reves es ".strrev($nombre)."<br>";
                    }
        
                ?>
        </div>
    </body>
</html>
