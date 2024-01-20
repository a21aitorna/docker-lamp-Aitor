<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="idioma">Selecciona tu idioma</label>
        <select name="idioma" id="idioma" onchange="document.getElementById('languageForm').submit()">
            <option value="" disabled selected hidden>-- Selecciona un idioma --</option>
            <option value="es">Español</option>
            <option value="en">English</option>
            <option value="gl">Galician</option>
        </select>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['idioma'])) {
                $_SESSION['idioma'] = $_POST['idioma'];
            }
        }

        $fraseBienvenida = array(
            'es' => 'Bienvenido a mi página!',
            'en' => 'Welcome to my page!',
            'gl' => 'Benvido a miña páxina!'
        );

        if (isset($_SESSION['idioma']) && isset($fraseBienvenida[$_SESSION['idioma']])) {
            echo '<p>' . $fraseBienvenida[$_SESSION['idioma']] . '</p>';
        } else {
            echo '<p>' . $fraseBienvenida['en'] . '</p>';
        }
    ?>
</body>
</html>
