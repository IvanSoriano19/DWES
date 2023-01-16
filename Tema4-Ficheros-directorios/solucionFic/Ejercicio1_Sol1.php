<?php
/*Ejercicio 1 Realiza una función denominada escribirTresNumeros que reciba tres números enteros
como parámetros y proceda a escribir dichos números en tres líneas en un archivo denominado
datosEjercicio.txt. Si el archivo no existe, debe crearlo. Devolverá true si la operación se ha realizado con
éxito y false en caso contrario.
*/

//Lista de parámetros. Permite número indefinido de parámetros
function escribirTresNumeros($ruta = "ficheros/datosEjercicio.txt", ...$num)
{
	$ruta = "ficheros/datosEjercicio.txt";

	//Si existe, se abre el fichero en modo escritura
	if ($archivo = fopen($ruta, 'w')) {
		foreach ($num as $a) {
			fwrite($archivo, $a . PHP_EOL);
		}

		fclose($archivo);
		
		return true;
	} else
	
		return false;
}

$num1 = 1;
$num2 = 2;
$num3 = 3;
$ruta = "ficheros/datosEjercicio.txt";
escribirTresNumeros($ruta, $num1, $num2, $num3);
