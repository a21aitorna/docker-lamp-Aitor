<?php

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Obtener el nombre y el contenido de la nota desde el formulario
    $nombre = $_POST['nombre'] ?? '';
    $contenido = $_POST['contenido'] ?? '';

    //Guardar la nota en un archivo
        //Creo el nombre del fichero
    $directorio_notas="notas/";
    $nombreFichero = "$directorio_notas$nombre.txt";
        //Creo el fichero
    fopen($nombreFichero, "w") or die("Error");
        //Metp el contenido del fichero
    fwrite($nombreFichero, $contenido);
        //Cierro el fichero
    fclose($nombreFichero);
        //Declaro el directorio
    
    //     //Muevo archivo
   // move_uploaded_file($_FILES[$nombreFichero]["tmp_name"],$directorio_notas.$nombreFichero);
  
    echo "La nota se ha guardado correctamente en el archivo: $directorio_notas$nombre.txt";
} else {
    // Si no se han enviado los datos del formulario, redirigir al formulario
    header('Location: formulario.html');
    exit();
}
