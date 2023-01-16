<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 7</title>
</head>
<body>
    
    <?php

    $min = 1;
    $max = 6;
    $jugador1_1 = rand ( $min , $max );
    $jugador1_2 = rand ( $min , $max );

    $jugador2_1 = rand ( $min , $max );
    $jugador2_2 = rand ( $min , $max );

    echo "<img src='./imagenes/dado/" . $jugador1_1 . ".jpg'></img>";
    echo "<img src='./imagenes/dado/" . $jugador1_2 . ".jpg'></img>";
    echo "<br />";
    echo "<img src='./imagenes/dado/" . $jugador2_1 . ".jpg'></img>";
    echo "<img src='./imagenes/dado/" . $jugador2_2 . ".jpg'></img>";
    echo "<br />";

    if (($jugador1_1 == $jugador1_2) && ($jugador2_1 == $jugador2_2)) {
        if (($jugador1_1 + $jugador1_2) > ($jugador2_1 + $jugador2_2)) {
            echo "Ha ganado el jugador 1";
        } else {
            echo "Ha ganado el jugador 2";
        }
        
    } else if ($jugador1_1 == $jugador1_2) {
        echo "El jugador 1 ha ganado";
    } else if ($jugador2_1 == $jugador2_2) {
        echo "El jugador 2 ha ganado";
    } else {
        if (($jugador1_1 + $jugador1_2) > ($jugador2_1 + $jugador2_2)) {
            echo "Ha ganado el jugador 1";
        } else if (($jugador1_1 + $jugador1_2) < ($jugador2_1 + $jugador2_2)) {
            echo "Ha ganado el jugador 2";
        } else {
            echo "Ha ocurrido un empate";
        }
    }
    echo "<br />";

    echo "<a href='./ejercicio_7.php'>Repetir tirada</a>";

    ?>
    
</body>
</html>