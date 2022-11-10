<?php 

    // * para imprimir valores que nos pasan por un array, son dinamicas

    function printRadio(array $valores, string $nombre){
        foreach ($valores as $valor) {
            echo '<input type="radio" name="'.$nombre.'[] " value="'.$valor.'">'.$valor.'<br>';
        }
    }


    function printCheck(array $valores, string $nombre)
    {
        foreach ($valores as $valor) {
            echo '<label> <input type="checkbox" name="'.$nombre.'[] " value="'.$valor.'">'.$valor.' </label><br>';
        }
    }


?>