<?php
include('./libs/bGeneral.php');
include('./libs/componentes.php');
cabecera();
$error = false;

// array donde almacenaremos el texto de los errores encontrados
$errores = [];
$nombre = "";
$premium = "";
$provincias = array("Valencia", "Alicante", "Castellon");
$aficiones = array("cine", "deporte", "viajar", "videojuegos");


//Compruebo si se ha pulsado el botón del formulario
if (!isset($_REQUEST['bAceptar'])) {

    require("formEjercicio3.php");
} else {

    $nombre = recoge("nombre");
    $datosProvincias = recoge("provincias");
    $datosAficiones = recogeArray("aficiones");
    cTexto($nombre, "nombre", $errores);
    cRadio($datosProvincias, "provincias", $errores, $provincias);
    // Validamos las aficiones seleccionadas según los valores posibles y teniendo en cuenta que es obligatorio
    cCheck($datosAficiones, "aficiones", $errores, $aficiones);


    if (!empty($errores)) {
        require("formEjercicio3.php");
    } else {
        //Serializanos (convertimos a string)el array para poder pasarlo por la URL
        $serializeAficiones = serialize($datosAficiones);
        header("location:correcto.php?nombre=$nombre&provincias=$datosProvincias&aficiones=$serializeAficiones");
    }
}

pie();
