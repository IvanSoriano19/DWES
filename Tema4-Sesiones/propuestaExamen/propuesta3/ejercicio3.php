<?php

include("bGeneral.php");

cabecera();

function buscarCadena($cadena, $ruta)
{

    $repetida = 0;
    $lineaNum = 0;
    $lineaLocalizada = 0;
    if (is_file($ruta)) {
        if ($fichero = fopen($ruta, "r")) {
            $cadena = sinTildes($cadena);
            $cadena = strtolower($cadena);

            while (!feof($fichero)) {

                $linea = strtolower(fgets($fichero));
                $encontrarCadena = stripos($linea, $cadena);
                if ($encontrarCadena !== 0) {
                    $repetida++;
                    $lineaLocalizada = $lineaNum;
                }
                $lineaNum++;
            }
            fclose($fichero);
        } else {
            return false;
            echo "No se ha podido abrir el archivo";
        }
    } else {
        return false;
    }

    $devuelve = "La palabra se repite $repetida veces y esta en la linea $lineaLocalizada";
    return $devuelve;
}

$cadena = "Iván";
$ruta = "archivo.txt";
echo buscarCadena($cadena, $ruta);





pie();
