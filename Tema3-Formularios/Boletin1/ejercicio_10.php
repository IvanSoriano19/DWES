<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 10</title>
</head>
<body>
    <?php

    $min = 0;
    $repite = 0;
    $numero = rand(1, 6);
    $min = $numero;

    for ($i =1; $i <= 10; $i++) { 

        $numero = rand(1, 6);
        echo "<img src=\"imagenes\dado\\$numero.jpg\">";
        

        if ($numero < $min) {
            $min = $numero;
            $repite = 1;
        }else if ($numero == $min){
            $repite++;
        }
    }

    echo "La que mas se ha repetido ha sido $min y se ha repetido $repite vez/veces.";
    ?>
</body>
</html>