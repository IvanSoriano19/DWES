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
    // $sinopsis = recogeArea("sinopsis");
    $datosGeneros = recogeArray("generos");

    $error = false;

    cCheck($datosGeneros, "generos", $errores, $generos);

    cTexto($titulo, "titulo", $errores, 40);
    // cTexto($sinopsis, "sinopsis", $errores, 400);

    if (empty($errores)) {

        $file = cfile("imagen",  $errores, $extensionesValidas, $rutaImagenes, $maxFichero);



        if (!empty($errores)) {
            require("formulario.php");
            
        } else {
            $serializeGeneros = serialize($datosGeneros);
            header("location:correcto.php?titulo=$titulo&generos=$serializeGeneros&file=$file");
            //&sinopsis=$sinopsis
        }
    } else {
        require("formulario.php");
    }
}


pie();
