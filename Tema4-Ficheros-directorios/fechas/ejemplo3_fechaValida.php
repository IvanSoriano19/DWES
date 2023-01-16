<?php 
/*/
 * Comprobamos si los parámetros pasados corresponden 
 * a una fecha válida
 */
include ('bGeneral.php');
//La función cabecera es una función propia que introduce la cabecera html
cabecera($_SERVER['PHP_SELF']);
    $fecha_valida = checkdate(2, 29, 2012);
    if ($fecha_valida=='true')
        echo 'ok';
    else 
        echo 'no';
