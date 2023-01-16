<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 7</title>
</head>
<body>

    <?php

    $numero1 = rand(1, 6); 
    $numero2 = rand(1, 6);
    $numero3 = rand(1, 6); 
    $numero4 = rand(1, 6);

    $ruta1=".\imagenes\dado\\$numero1.jpg";
    $ruta2=".\imagenes\dado\\$numero2.jpg";
    $ruta3=".\imagenes\dado\\$numero3.jpg";
    $ruta4=".\imagenes\dado\\$numero4.jpg";

    ?>

    <div>
        
        <h1>Jugador 1</h1>
            <img src="<?php echo $ruta1 ?>" width="70px" height="70px">
            <img src="<?php echo $ruta2 ?>" width="70px" height="70px"> 
        <hr>
        <h1>Jugador 2</h1>
            <img src="<?php echo $ruta3 ?>" width="70px" height="70px"> 
            <img src="<?php echo $ruta4 ?>" width="70px" height="70px"> 
        <hr>

    <?php
    if($numero1 == $numero2 && $numero3 == $numero4) {

        $suma1 = $numero1 + $numero2;
        $suma2 = $numero3 + $numero4;

        if ($suma1 > $suma2) {
            $a = "Ha ganado el jugador 1";
        }else if($suma1 == $suma2){
            $a = "Habeis quedado empate";
        }else{
            $a = "Ha ganado el jugador 2";
        }

    }else if($numero1 == $numero2 || $numero3 == $numero4) {

        if ($numero1 == $numero2) {
            
            $a = "Ha ganado el jugador 1";
        }else{
            $a = "Ha ganado el jugador 2";
        }
    }else{

        $suma1 = $numero1 + $numero2;
        $suma2 = $numero3 + $numero4;

        if ($suma1 > $suma2) {
            $a = "Ha ganado el jugador 1";
        }else if($suma1 == $suma2){
            $a = "Habeis quedado empate";
        }else{
            $a = "Ha ganado el jugador 2";
        }
    }
    
    ?>

    <p><?php echo "$a"?></p>
</div>
</body>
</html>