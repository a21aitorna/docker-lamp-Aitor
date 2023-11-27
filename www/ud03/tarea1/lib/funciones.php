<?php
    function comprobarCampoTexto($texto){
        if(!empty($texto) && is_string($texto)){
            return true;
        }
    }
    function comprobarCampoNumerico($numero){
        if(!empty($numero) && is_numeric($numero)){
            return true;
        }
    }
    
?>