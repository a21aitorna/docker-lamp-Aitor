<?php
    require_once 'ExcepcionPropia.php';
    require_once 'ExcepcionPropiaClase.php';

    try {
        ExcepcionPropiaClase::testNumber(0);
    } catch (ExcepcionPropia $e) {
        echo  $e->getMessage();
}


?>