<?php

// Suponemos que jugador 2 será la máquina
// Le pasamos los arrays con las tiradas
// La función devolverá 0 en caso de empate, 1 si gana jugador_1 y 2 si gana jugador_2
function jugar($jugador_1, $jugador_2)
{
    $suma1 = 0;
    $suma2 = 0;

    

    if (($jugador_1[0] == $jugador_1[1]) && ($jugador_2[0] == $jugador_2[1])) {
        if ($jugador_1[0] > $jugador_2[0]) {
            return 1;
        } else if ($jugador_1[0] < $jugador_2[0]) {
            return 2;
        } else {
            return 0;
        }
    } else if (($jugador_1[0] == $jugador_1[1]) || ($jugador_2[0] == $jugador_2[1])) {
        if ($jugador_1[0] == $jugador_1[1]) {
            return 1;
        } else {
            return 2;
        }
    } else {
        $suma1 = $jugador_1[0] + $jugador_1[1];
        $suma2 = $jugador_2[0] + $jugador_2[1];
        if ($suma1 > $suma2) {
            return 1;
        } else if ($suma1 < $suma2) {
            return 2;
        } else {
            return 0;
        }
    }
}

// guardar resultado 0 en caso de empate, 1 ganador jugador_1, 2 ganador jugador_2
function guardaDato($ganador)
{
    $contenido = file_get_contents("resultados.txt");
    $datos = explode(";", $contenido); // [0] empate, [1] jugador, [2] máquina
    $datos["$ganador"] ++;
    $cadDatos=implode(";", $datos);
    $result = file_put_contents("resultados.txt", $cadDatos);
    echo "$result";
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