
<?php
echo "Now ".strtotime("now")  ."<br>";
//Si la fecha es anterior a 1970 el entero devuelto será negativo
echo "Año anterior a 1970 ".strtotime("10 September 1950")."<br>";
/*Si el número del año se especifica en un formato de dos dígitos, 
 *los valores entre 00-69 hacen referencia a 2000-2069 y 70-99 a 1970-1999.
 */
echo date(("d/m/Y"), strtotime("10 September 1967"))  ."<br>";
echo date(("d/m/Y"), strtotime("10 September 1923"))  ."<br>";
echo date(("d/m/y"), strtotime("+1 day"))."<br>";
echo date(("d/m/y"), strtotime("+1 week, now")) ."<br>";
echo strtotime("+1 week 2 days 4 hours 2 seconds") ."<br>";
echo strtotime("next Thursday")."<br>";
echo strtotime("last Monday")."<br>";


//Comprobar cadena no valida
/*
 * Las fechas en los formatos m/d/y o d-m-y no son ambiguas.
 *  Si el separador es una barra (/), se asume el formato norteamericano m/d/y; 
 * Si el separador es un guion (-) o un punto (.), se asume el formato europeo d-m-y. 
 * Si el año se proporciona en un formato de dos dígitos y el separador es un guion (-), 
 * la cadena de la fecha se analiza como y-m-d para evitar este problema utilizar el formato YYYY-MM-DD
 */
$cadena = '2020-10-20';

// antes de PHP 5.1.0 se debería de comparar con -1, en vez de con false
//Cuidado porque false se evalua como 0, utilizar ===
if (($timestamp = strtotime($cadena)) === false) {
    echo "La cadena ($cadena) es falsa";
} else {
    echo "$cadena == " . date('l dS \o\f F Y h:i:s A', $timestamp);
}
?>
