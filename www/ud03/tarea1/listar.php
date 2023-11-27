<?php
    include "lib/db_conf.php";
    $conexion = conexionBD();
    seleccionDB($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table>
        <?php
            $sentencia = $conexion->prepare("SELECT * FROM usuarios");
            $sentencia->execute();
            $resultado = $sentencia->get_result();
        ?>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Provincia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($fila = $resultado->fetch_array(MYSQLI_BOTH)){
                    echo "<tr>
                        <td>".$fila['id']."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['apellidos']."</td>
                        <td>".$fila['edad']."</td>
                        <td>".$fila['provincia']."</td>
                        <td>
                            <a href= 'editar.php?id=".$fila['id']."'> <button type='submit' name='modificar'>Modificar usuario</button></a><br>
                            <a href= 'borrar.php?id=".$fila['id']."'> <button type='submit' name='eliminar'>Eliminar usuario</button></a><br>
                        </td>
                    </tr>";
                }
            ?>
        </tbody>       
    </table>

    <footer>
        <a href='index.php'>Volver a la pagina principal</a>
    </footer>

</body>
</html>