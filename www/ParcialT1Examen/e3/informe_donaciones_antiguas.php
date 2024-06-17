<?php

include "lib/base_datos.php";
include "lib/utilidades.php";
include "lib/donaciones.php";

$conexion = get_conexion();
seleccionar_bd_donacion($conexion);


if (isset($_POST['anterior'])) {
    $anterior = test_input($_POST['anterior']);
    $donaciones = get_donaciones_antiguas($conexion, $anterior);
}
else{
    $donaciones = array();
}

cerrar_conexion($conexion);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <h1>Mirar donaciones antiguas a la fecha</h1>


  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Escoge la fecha: <input type="date" name="anterior"><br>
      
      <input type="submit" name="enviar" value="Enviar"> 
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de donacion</th>
                <th>Proxima fecha de donacion</th>
            </tr>
       </thead>
       <tbody>  
            <?php
                imprimir_donaciones($donaciones);
            ?>
       </tbody>
    </table>
  <footer>
      <p><a href='index.php'>Página de inicio</a></p>
  </footer>

  <?php cerrar_conexion($conexion);?>

</body>

</html>