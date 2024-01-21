<?php
// considere que en este ejercicio no se subia nada a base de datos, que solo fueran los directorios
require "lib/base_datos.php";
require "lib/utilidades.php";
require "lib/funciones.php";

$mensajes = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $nombre = test_input($_POST["nombre"]);
    $descripcion = test_input($_POST["descripcion"]);
    $precio = test_input($_POST["precio"]);
    $unidades = test_input($_POST["unidades"]);

    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
        $archivo = $_FILES["archivo"];

        $nombreArchivo = $archivo["name"];
        $tamanhoArchivo = $archivo["size"];

        $fileExtension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);

        $uploadDirectory = determinarDirectorio($fileExtension);

        move_uploaded_file($archivo["tmp_name"], $uploadDirectory . $nombreArchivo);

        $mensajes = "Producto dado de alta correctamente";
    } else {
        $mensajes = "Error al cargar el archivo.";
    }
}

function determinarDirectorio($fileExtension) {
    switch ($fileExtension) {
        case 'txt':
            return "uploads/textos/";
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            return "uploads/imagenes/";
        case 'pdf':
            return "uploads/pdf/";
        default:
            return "uploads/otros/";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
        crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Alta de Producto</h1>

        <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="text" class="form-control" name="precio" required>
            </div>
            <div class="mb-3">
                <label for="unidades" class="form-label">Unidades disponibles:</label>
                <input type="text" class="form-control" name="unidades" required>
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label">Archivo:</label>
                <input type="file" class="form-control" name="archivo" accept="     *" required>
            </div>
            <input type="submit" name="submit" value="Agregar Producto" class="btn btn-primary">
        </form>

        <?= $mensajes; ?>

        <p class="mt-3">
            <a class="btn btn-secondary" href="listar.php" role="button">Volver a la Lista de Productos</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>
