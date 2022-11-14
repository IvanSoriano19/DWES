<?php
require("libs/bGeneral.php");
require("libs/componentes.php");
require("libs/config.php");

cabecera("Ejercicio Peliculas");

$errores = [];
$titulo = "";
$fecha = "";
$sinopsis = "";

if (!isset($_REQUEST['bAceptar'])) {
    require("formulario.php");
} else {
    
    $titulo = recoge("titulo");
    $sinopsis = recogeArea("sinopsis");
    $datosGeneros = recogeArray("genero");

    $error = false;

    cCheck($datosGeneros, "genero", $errores, $generos);

    cTexto($titulo, "titulo", $errores, 40);
    cTexto($sinopsis, "sinopsis", $errores, 400);

    if (empty($errores)) {

        // $file = cfile("imagen",  $errores, $extensionesValidas, $rutaImagenes, $maxFichero);

        

        if (empty($errores)) {
            $serializeGenero=serialize($datosGeneros);
            header("location:correcto.php?titulo=$titulo&genero=$serializeGeneros");
            //&sinopsis=$sinopsis
        } else {
            require("formulario.php");
        }
    } else {
        require("formulario.php");
    }
}


pie();
