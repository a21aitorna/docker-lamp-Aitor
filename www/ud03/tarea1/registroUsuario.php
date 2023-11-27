<?php
    include "lib/db_conf.php";
    include "lib/funciones.php";

    if(isset($_POST['enviar'])){
        $conexion = conexionBD();
        seleccionDB($conexion);

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $edad= $_POST['edad'];
        $provincia = $_POST['provincia'];

        if(comprobarCampoTexto($nombre) && comprobarCampoTexto($apellidos) && comprobarCampoNumerico($edad) && comprobarCampoTexto($provincia)){
            $sentencia = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia) VALUES (?, ?, ?, ?)");
            $sentencia->bind_param("ssis", $nombre, $apellidos, $edad, $provincia);
            $sentencia->execute();
            $resultado =  $sentencia->get_result();

            $conexion->close();
            echo "<footer>
                <a href='index.php'>Volver a la pagina principal</a>
            </footer>";
        }
        else{
            echo "Alguno de los campos es incorrecto";
        }
    }

?>