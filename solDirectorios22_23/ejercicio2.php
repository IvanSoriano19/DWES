<?php
/*Ejercicio 2.- Código mostrar fotos. Modificar el ejercicio 1, de manera que en la carpeta
fotos podemos tener tanto fotos como otras carpetas que a su vez también pueden tener
imágenes.*/


require 'libs/bFicherosDirectorios.php';
require"libs/bGeneral.php";
require"libs/bComponentes.php";

cabecera("Ejercicio2");

$rutaExplorar="imagenes";
$elementos=devuelveDirSubdirREcursiva("$rutaExplorar");
mostrarTabla($elementos);
pie();

?>

