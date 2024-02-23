<?php
    include 'Jugador.php';
    
    //OBJETO CLASE JUGADOR
    echo "JUGADORES<br>";
    $jugador1 = new Jugador('Lionel Messi', 34, 'Delantero');
    $jugador2 = new Jugador('Cristiano Ronaldo', 36, 'Delantero');

    //OBTENER DATOS INCIALES JUGADOR
    echo "Jugador 1 <br> Nombre: ".$jugador1->getNombre()."<br> Edad: ".$jugador1->getEdad()."
    <br>Posicion: ".$jugador1->getPosicion()."<br><br>";

    echo "Jugador 2 <br> Nombre: ".$jugador2->getNombre()."<br> Edad: ".$jugador2->getEdad()."
    <br>Posicion: ".$jugador2->getPosicion()."<br><br>";

    //JUGADORES MODIFICADOS
    echo "JUGADORES MODIFICADOS<br>";
    $jugador1->setNombre("Neymar");
    $jugador1->setEdad(29);
    $jugador1->setPosicion("Centrocampista");

    $jugador2->setNombre("Kylian Mbappé");
    $jugador2->setEdad(23);
    $jugador2->setPosicion("Delantero");

    echo "Jugador 1 <br> Nombre: ".$jugador1->getNombre()."<br> Edad: ".$jugador1->getEdad()."
    <br>Posicion: ".$jugador1->getPosicion()."<br><br>";

    echo "Jugador 2 <br> Nombre: ".$jugador2->getNombre()."<br> Edad: ".$jugador2->getEdad()."
    <br>Posicion: ".$jugador2->getPosicion()."<br><br>";


?>