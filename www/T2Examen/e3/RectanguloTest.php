<?php
    include_once "Rectangulo.php";
    use e3\Rectangulo;

    $rectangulo1 = new Rectangulo(4,5);
    $rectangulo1->dibujar();
    $rectangulo1->agrandar(4);
    $rectangulo1->encoger(2);

    $rectangulo2 = new Rectangulo(88,16);
    $rectangulo2->dibujar();
    $rectangulo2->agrandar(2);
    $rectangulo2->encoger(4);
?>