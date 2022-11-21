<?php

function escribirTresNumeros($n1 = 1, $n2 = 2, $n3 = 3, $ruta = "datosEjercicio.txt")
{

    if ($archivo = fopen($ruta, "w")) {
        fwrite($archivo, $n1 . PHP_EOL);
        fwrite($archivo, $n2 . PHP_EOL);
        fwrite($archivo, $n3 . PHP_EOL);
        fclose($archivo);
        return true;
        
    } else {
        return false;
    }
}

escribirTresNumeros();


?>