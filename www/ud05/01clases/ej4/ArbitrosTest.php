<?php
    include 'Arbitro.php';

    //OBJETOS CLASE ARBITRO
    echo "ARBITROS<br>";
    $arbitro1 = new Arbitro('Aitor', 24, 5);
    $arbitro2 = new Arbitro('Pepe', 40, 20);

    //OBTENER DATOS INCIALES ARBITRO
    echo "Arbitro 1 <br> Nombre: ".$arbitro1->getNombre()."<br> Edad: ".$arbitro1->getEdad()."
    <br>Posicion: ".$arbitro1->getAnhosArbitrados()."<br><br>";

    echo "Arbitro 2 <br> Nombre: ".$arbitro2->getNombre()."<br> Edad: ".$arbitro2->getEdad()."
    <br>Posicion: ".$arbitro2->getAnhosArbitrados()."<br><br>";

    //ARBITROS MODIFICADOS
    echo "ARBITROS MODIFICADOS<br>";
    $arbitro1->setNombre("Paco");
    $arbitro1->setEdad(30);
    $arbitro1->setAnhosArbitrados(10);

    $arbitro2->setNombre("Manolo");
    $arbitro2->setEdad(46);
    $arbitro2->setAnhosArbitrados(30);

    echo "Arbitro 1 <br> Nombre: ".$arbitro1->getNombre()."<br> Edad: ".$arbitro1->getEdad()."
    <br>Posicion: ".$arbitro1->getAnhosArbitrados()."<br><br>";

    echo "Arbitro 2 <br> Nombre: ".$arbitro2->getNombre()."<br> Edad: ".$arbitro2->getEdad()."
    <br>Posicion: ".$arbitro2->getAnhosArbitrados()."<br><br>";


?>