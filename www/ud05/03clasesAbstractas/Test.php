<?php
require_once 'Usuario.php';
require_once 'Administrador.php';

$usuario1 = new Usuario(1, 'Aitor', 'Novoa Alonso');
$usuario2 = new Usuario(2, "Jaime", "Novoa Alonso");
$administrador = new Administrador(3, 'Ana María', 'Alonso Vieitez');


echo $usuario1->accion(); 
echo $usuario2->accion();
echo $administrador->accion(); 
?>
