<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 6</title>
</head>
<body>
    <?php

    $numero1 = rand(1, 6); 
    $numero2 = rand(1, 6);

    echo "<img src=\"imagenes\dado\\$numero1.jpg\">";
    echo "<img src=\"imagenes\dado\\$numero2.jpg\">";
    echo "<hr><br>";

    if ($numero1 > $numero2) {
        echo "Ha ganado el jugador 1";
    }else if($numero1 == $numero2){
        echo "Habeis quedado empate";
    }else{
        echo "Ha ganado el jugador 2";
    }

    echo "<br><br>";
    echo "<a href=ejercicio_6.php>Volver a jugar</a>";
    ?>
</body>
</html>