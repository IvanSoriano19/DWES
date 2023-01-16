<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 10</title>
</head>
<body>
<p>
    <?php
        $minimo = 0;//variable para guardar el minimo
        $veces = 1;
        $tirada = rand(1,6);//realizar la primera tirada antes del bucle
        $minimo = $tirada;
        
        echo "<strong> Tiradas: </strong> $tirada";
        
        for($i = 1; $i < 10; $i++){
            
            $tirada = rand(1,6);
            echo ", $tirada";
            
            /*Si el minimo es mayor que la tirada, entonces el nuevo minimo es esa tirada
            y el contador de las veces se reinicia. Si no, se aumenta el numero de veces. */
            if($minimo > $tirada){
                $minimo = $tirada;
                $veces = 1;
            }else if($minimo == $tirada){
                $veces++;
            }
            
        }
        
        
        echo "<br>La tirada mas baja ha sido con el número $minimo y ha salido $veces veces.";
        
    ?>
</p>
</body>
</html>