<?php
/*Ejercicio 1.- Código mostrar fotos. Escribir el código necesario que muestre en una tabla
de 2 columnas todas las imágenes de el directorio "fotos". Si hay una carpeta dentro no
mostraremos su contenido, sólo los ficheros que se encuentren en “fotos”.*/


require 'libs/bFicherosDirectorios.php';
require"libs/bGeneral.php";
require"libs/bComponentes.php";

cabecera("Ejercicio1");

$rutaExplorar="imagenes";
$elementos=devuelveFicheros("$rutaExplorar");

mostrarTabla($elementos);
pie();

?>

