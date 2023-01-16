<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 11</title>
</head>
<body>
    <?php

    $par = 0;
    $impar = 0;
    $numero = rand(1, 6);
    

    for ($i =1; $i <= 10; $i++) { 

        $numero = rand(1, 6);
        echo "<img src=\"imagenes\dado\\$numero.jpg\" width=\"50px\" height=\"50px\">";
        

        if ($numero % 2 == 0) {
            $par++;
        }else{
            $impar++;
        }
    }

    echo "Han salido $par pares y $impar impares";
    ?>
</body>
</html>