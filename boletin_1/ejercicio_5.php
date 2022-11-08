<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 2</title>
</head>
<body>
<p>
<?php

$numero_1=(rand(1,6));

$numero_2=(rand(1,6));


echo "<img src=\"imagenes\dado\\$numero_1.jpg\"/>";


echo "<img src=\"imagenes\dado\\$numero_2.jpg\"/>";

echo "<br>";

echo "Has sacado $numero_1 y $numero_2, en total ".($numero_1+$numero_2)." puntos"

?>
</p>
</body>
</html>