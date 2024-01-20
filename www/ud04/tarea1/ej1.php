<?php
    session_start();

    if(!isset($_COOKIE['visitas'])){
        setcookie('visitas',1,time()+3600);
        $visitas = 1;
    }
    else{
        $visitas = ++$_COOKIE['visitas'];
        setcookie('visitas',$visitas ,time()+3600);
    }
    echo "El numero de visitas fueron: $visitas."
?>