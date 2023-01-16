<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 4</title>
</head>
<body>
    <?php
    
    const radio = 6378.14;
    const distancia = 149597870;
    const PI = 3.14;

    $circunferencia = 2 * PI * radio;
    $vueltas = distancia / $circunferencia;

    echo "La circunferencia de la tierra es de $circunferencia Km<br>
            y las vueltas al mundo que equivalen a la distancia entre la estrella y el planeta son $vueltas";

    ?>
</body>
</html>