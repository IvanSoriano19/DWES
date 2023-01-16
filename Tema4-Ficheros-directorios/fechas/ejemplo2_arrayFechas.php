<?php
include ('bGeneral.php');
//La función cabecera es una función propia que introduce la cabecera html
cabecera($_SERVER['PHP_SELF']);
// Recuperamos la fecha actual en formato array

$hoy = getdate();
//Visualizamos el contenido del array
echo "<pre>";
print_r($hoy);
echo "</pre>";
?>
