<?php
    include_once 'biblioteca.php';
    include_once 'libro.php';
    include_once 'revista.php';
    include_once 'dvd.php';
    

    $biblioteca1 = new Biblioteca("Biblioteca de Ponteareas", "Calle algo", 684521456);
    $libro1 = new Libro(1, "pdf", 1999, "Harry Potter y la Piedra Filosofal", "J.K. Rowling", 256);
    $libro2 = new Libro(2, "pdf", 2001, "Harry Potter y la Camara Secreta", "J.K. Rowling", 290);
    $libro3 = new Libro(3, "epub", 2003, "Harry Potter y el Prisionero de Azkaban", "J.K. Rowling", 343);

    $biblioteca1->listarNumeroBibliotecas();
    $biblioteca1->registrarDocumento($libro1);
    $biblioteca1->registrarDocumento($libro2);
    $biblioteca1->registrarDocumento($libro3);

    echo "Listado epub <br>";
    $biblioteca1->listarDocumentosFormato("epub");
    

    $biblioteca1->listarDocumentos();
    $biblioteca1->borrarDocumentoId(1);
    $biblioteca1->borrarDocumentoId(1);
    $biblioteca1->listarDocumentos();

    $biblioteca2 = new Biblioteca ("Biblioteca de Ferrol", "Calle menos idea aún", 987654321);
    
    $biblioteca1->listarNumeroBibliotecas();