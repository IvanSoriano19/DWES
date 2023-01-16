<?php

function sumarNumeros($ruta = "../ejercicio1/datosEjercicio.txt")
{
    $suma = 0;

    if (is_file($ruta)) {

        if ($archivo = fopen($ruta, "r")) {

            while (!feof($archivo)) {
                $linea = intval(fgets($archivo));
                $suma += $linea;
            }
            fclose($archivo);
        } 
    } 
    
    return $suma;
}

$getSuma = sumarNumeros();
echo "$getSuma";
