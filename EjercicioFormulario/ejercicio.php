<?php
require("libs/bGeneral.php");
require("libs/componentes.php");
require("libs/config.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

cabecera("Ejercicio Peliculas");

$errores = [];
$titulo = "";
$fecha = "";
$sinopsis = "";

if (!isset($_REQUEST['bAceptar'])) {
    require("formulario.php");
} else {

    $titulo = recoge("titulo");
    $duracion = recoge("duracion");
    $sinopsis = recogeArea("sinopsis");
    $datosGeneros = recogeArray("generos");
    $pais = recoge("pais");
    $fecha = recogeNormal("fecha");

    $error = false;

    cCheck($datosGeneros, "generos", $errores, $generos);
    cNum($duracion, "duracion", $errores);

    cTexto($titulo, "titulo", $errores, 40);
    cTexto($pais, "pais", $errores, 40);

    

    if (empty($errores)) {

        $file = cfile("imagen",  $errores, $extensionesValidas, $rutaImagenes, $maxFichero, true);
        $imagenReparto1 = cfile("imagenReparto1",  $errores, $extensionesValidas, $rutaImagenes, $maxFichero, false);
        $imagenReparto2 = cfile("imagenReparto2",  $errores, $extensionesValidas, $rutaImagenes, $maxFichero, false);


        if (!empty($errores)) {
            require("formulario.php");
            
        } else {
            $serializeGeneros = serialize($datosGeneros);
            header("location:correcto.php?titulo=$titulo&fecha=$fecha&generos=$serializeGeneros&duracion=$duracion&pais=$pais&sinopsis=$sinopsis&file=$file&imagenReparto1=$imagenReparto1&imagenReparto2=$imagenReparto2");
        }
    } else {
        require("formulario.php");
    }
}


pie();
