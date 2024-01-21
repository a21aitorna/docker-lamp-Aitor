<?php

function compruebaExtension($nombreArchivo)
{
    $extensionesPermitidas = array('png', 'jpg', 'jpeg', 'gif');
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    return in_array($extension, $extensionesPermitidas);
}

function compruebaTamanho($filesize)
{
    $max_size = 50 * 1024 * 1024;
    return $filesize <= $max_size;
}


