<?php
include 'lib/conexion.php';

$stmt = $conn->query("SELECT id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil FROM donantes");
$donantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscarDonantes'])) {
    $textoBusqueda = validarInput($_POST["textoBusqueda"]);
    $campoBusqueda = validarInput($_POST["campoBusqueda"]);

    $sql = "SELECT id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil FROM donantes WHERE $campoBusqueda LIKE :textoBusqueda";

   
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':textoBusqueda', '%' . $textoBusqueda . '%', PDO::PARAM_STR);
    $stmt->execute();

    // Obtener resultados
    $donantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Donantes</title>
</head>
<body>
<h2>Búsqueda de Donantes</h2>

    <form method="post">
        <label for="textoBusqueda">Texto de Búsqueda:</label>
        <input type="text" id="textoBusqueda" name="textoBusqueda" required>

        <label for="campoBusqueda">Campo de Búsqueda:</label>
        <select id="campoBusqueda" name="campoBusqueda" required>
            <option value="codigo_postal">Nombre</option>
            <option value="grupo_sanguineo">Grupo Sanguíneo</option>
        </select>


        <button type="submit" name="buscarDonantes">Buscar Donantes</button>
    </form>

    <h2>Lista de Donantes</h2>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Grupo Sanguíneo</th>
            <th>Código Postal</th>
            <th>Teléfono Móvil</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($donantes as $donante): ?>
            <tr>
                <td><?php echo $donante['id']; ?></td>
                <td><?php echo $donante['nombre']; ?></td>
                <td><?php echo $donante['apellidos']; ?></td>
                <td><?php echo $donante['edad']; ?></td>
                <td><?php echo $donante['grupo_sanguineo']; ?></td>
                <td><?php echo $donante['codigo_postal']; ?></td>
                <td><?php echo $donante['telefono_movil']; ?></td>
                <td>
                    <a href="registrarDonacion.php?id=<?php echo $donante['id']; ?>"><button type="submit" name="registrarDonacion">Registrar Donación</button></a> <br>
                    <a href="eliminarDonante.php?id=<?php echo $donante['id']; ?>"><button type="submit" name="eliminarDonante">Eliminar donante</button></a> <br>
                    <a href="listarDonacionesDonante.php?id=<?php echo $donante['id']; ?>"><button type="submit" name="listarDonaciones">Listar donaciones</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <footer>
        <a href="index.php">Volver al principio</a>
    </footer>
</body>
</html>
<?php

function validarInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>