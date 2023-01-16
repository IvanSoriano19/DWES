<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 10</title>
</head>
<body>
    <?php

    
    $repite1 = 0;
    $repite2 = 0;
    $repite3 = 0;
    $repite4 = 0;
    $repite5 = 0;
    $repite6 = 0;
    

    for ($i =1; $i <= 20; $i++) { 

        $numero = rand(1, 6);
        echo "<img src=\"imagenes\dado\\$numero.jpg\" width=\"50px\" height=\"50px\">";
        
        switch ($numero) {
            case 1:
                $repite1++;
                break;
            case 2:
                $repite2++;
                break;
            case 3:
                $repite3++;
                break;
            case 4:
                $repite4++;
                break;
            case 5:
                $repite5++;
                break;
            case 6:
                $repite6++;
                break;
            default:
                break;
        }

    }

    echo "<br>El 1 se ha repetido $repite1 veces<br>
            El 2 se ha repetido $repite2 veces<br>
            El 3 se ha repetido $repite3 veces<br>
            El 4 se ha repetido $repite4 veces<br>
            El 5 se ha repetido $repite5 veces<br>
            El 6 se ha repetido $repite6 veces<br>";
    ?>
</body>
</html>