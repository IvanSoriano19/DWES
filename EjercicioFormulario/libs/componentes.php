<?php

// * funcion para pintar los checkbox
function printCheck(array $valores, string $nombre){
    foreach ($valores as $valor) {
        echo '<label required> <input type="checkbox" name="' . $nombre . '[] " value="' . $valor . '">' . $valor . ' </label><br>';
    }
}

// * funcion para crear el desplegable
function printDesplegable(array $valores, string $nombre){

    echo '<select name="'.$nombre.'" required>';
        foreach ($valores as $value) {
            echo '<option value="'.$value.'">'.$value.'</option>';
        }
    echo '</select>';
    
}
