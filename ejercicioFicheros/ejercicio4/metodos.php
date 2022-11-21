<?php

function jugar($jugador, $maquina)
{

    if ($jugador[0] == $jugador[1] && $maquina[0] == $maquina[1]) {

        $suma1 = $jugador[0] + $jugador[1];
        $suma2 = $maquina[0] + $maquina[1];

        if ($suma1 > $suma2) {
            return 1;
        } else if ($suma1 == $suma2) {
            return 0;
        } else {
            return 2;
        }
    } else if ($jugador[0] == $jugador[1] || $maquina[0] == $maquina[1]) {

        if ($jugador[0] == $jugador[1]) {

            return 1;
        } else {
            return 2;
        }
    } else {

        $suma1 = $jugador[0] + $jugador[1];
        $suma2 = $maquina[0] + $maquina[1];

        if ($suma1 > $suma2) {
            return 1;
        } else if ($suma1 == $suma2) {
            return 0;
        } else {
            return 2;
        }
    }
}

function guardarDato($ganador){
    $contenido = file_get_contents("resultados.txt");
    $datos = explode(";", $contenido);
    $datos["$ganador"] ++;
    $cadDatos=implode(";", $datos);
    
    $result = file_put_contents("resultados.txt", $cadDatos);
    
    return $result;
}

function mostrarResultados()
{
    $contenido = file_get_contents("resultados.txt");
    $contenido = explode(';', $contenido);
    return $contenido;

}

function reseteo()
{
    if ($file = fopen("resultados.txt", "w+")) {
        fwrite($file, "0;0;0");
    }
}

?>
