<?php
    include "lib/db_conf.php";
    $conexion = conexionBD();
    seleccionDB($conexion);

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $sentencia = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $sentencia->bind_param("i",$_GET['id']);
        $sentencia->execute();
        
        if ($sentencia->affected_rows > 0) {
            echo "Usuario eliminado correctamente.";
        } else {
            echo "No se pudo eliminar el usuario.";
        }
    } else {
        echo "ID de usuario no válido.";
    }
    
    echo "<footer>
        <a href='index.php'>Volver a la pagina principal</a>
    </footer>";
    $conexion->close()
?>