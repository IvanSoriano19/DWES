<?php

/*
 * Ejercicio 1 Realiza una función denominada escribirTresNumeros que reciba tres números enteros
 * como parámetros y proceda a escribir dichos números en tres líneas en un archivo denominado
 * datosEjercicio.txt. Si el archivo no existe, debe crearlo. Devolverá true si la operación se ha realizado con
 * éxito y false en caso contrario.
 */


function escribirTresNumeros($n1=0, $n2=0, $n3=0, $ruta = "Ficheros/datosEjercicio.txt")
{
    
    // Antes de abrir el fichero, compruebo si existe
    if (is_file($ruta)) {
        // Abro el fichero en modo lectura
        if ($archivo = fopen($ruta, "w+")) {
            fwrite($archivo, $n1 . PHP_EOL);
            fwrite($archivo, $n2 . PHP_EOL);
            fwrite($archivo, $n3 . PHP_EOL);
            // Si lo he abierto, lo cierro
            fclose($archivo);
            return 'true';
        } else {
            return 'false';
        }
    } else
        return 'false';
}
?>