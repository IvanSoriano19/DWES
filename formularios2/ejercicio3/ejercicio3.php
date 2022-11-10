<?php

include "./libs/bGeneral.php";
include "./libs/dinamicos.php";

cabecera();

$errors = [];
$nombre = "";
$premium = "";
$provincias = ["Valencia", "Alicante", "Castellon"];
$aficiones = ["Cine", "Deporte", "Viajar", "Videojuegos"];


if (!isset($_REQUEST['bAceptar'])) {
    include "./formulario.php";
} else {

    $nombre = recoge("nombre");
    $provincia = recoge("provincias");
    $aficionesGet = recogeArray("aficiones");

    echo "$provincia";

    cTexto($nombre, "nombre", $errors);
    cRadio($provincia, "provincia", $errors, $provincias);
    cCheck($aficionesGet, "aficiones", $errors, $aficiones);


    if (!empty($errors)) {
        include "./formulario.php";
    } else {
        $serializeAficiones = serialize($aficionesGet);
        header("location:correcto.php?nombre=$nombre&provincias=$provincia&aficiones=$serializeAficiones");
    }
}
pie();
