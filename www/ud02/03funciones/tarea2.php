<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */

    function comprobar_nif($dni){
        $letra = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
        if(strlen($dni)==9){
            $dniMayuscula = strtoupper($dni);
            $dniNum = substr($dni,0,8);
            $dniLetra = substr($dni,8,9);
            $modulo = $dniNum%23;
            $dniValido = ($dniLetra == $letra[$modulo]) ? true : false;
            return $dniValido;
        }
        else{
            echo "El dni no es valido";
        }
    }

    echo comprobar_nif('54337734G');
?>