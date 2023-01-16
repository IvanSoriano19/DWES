<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 2</title>
</head>
<body>
<p>
<?php
 const radio = 6378.14;
 const distancia = 149600000;
 const PI = 3.14;
 
 $circunferencia = 2 * PI * radio;
 
 $totalVueltas = distancia / $circunferencia;
 
 echo "Distancia de una vuelta al mundo: $circunferencia"."."."<br>"."Vueltas al mundo equivalentes a su distancia respecto al Sol: $totalVueltas".".";
?>
</p>
</body>
</html>