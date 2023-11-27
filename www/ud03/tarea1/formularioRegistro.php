<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="registroUsuario.php" method='POST'>
        <label for="nombre">Introduce el nombre: </label>
        <input type="text" name="nombre"> <br>
        <label for="apellidos">Introduce los apellidos: </label>
        <input type="text" name="apellidos"> <br>
        <label for="edad">Introduce la edad: </label>
        <input type="number" name="edad"> <br>
        <label for="provincia">Introduce la provinciaks</label>
        <input type="text" name="provincia"> <br>
        <button type="submit" name="enviar">Enviar datos</button>
    </form> 

    <footer>
        <a href="index.php">Volver a la pagina principal</a>
    </footer>
    
</body>
</html>