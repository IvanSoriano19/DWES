<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Hola Mundo</title>
</head>
<body>
<?php
$suma = 0;
for ($i = 1; $i <= 2; $i++) {
    

Switch(rand(1,6)){
    case 1:
        echo '<img src="imagenes\dado\1.jpg" />';
        echo '<img src="imagenes\animales\burro.jpg" />';
        $suma = $suma +1;
        break;
    case 2:
        echo '<img src="imagenes\dado\2.jpg" />';
        echo '<img src="imagenes\animales\cerdo.jpg" />';
        
        $suma = $suma +2;
        break;
    case 3:
        echo '<img src="imagenes\dado\3.jpg" />';
        echo '<img src="imagenes\animales\oveja.jpg" />';
        $suma = $suma +3;
        break;
    case 4:
        echo '<img src="imagenes\dado\4.jpg" />';
        echo '<img src="imagenes\animales\panda.jpg" />';
        $suma = $suma +4;
        break;
    case 5:
        echo '<img src="imagenes\dado\5.jpg" />';
        echo '<img src="imagenes\animales\rana.jpg" />';
        $suma = $suma +5;
        break;
    case 6:
        echo '<img src="imagenes\dado\6.jpg" />';
        echo '<img src="imagenes\animales\raton.jpg" />';
        $suma = $suma +6;
        break;
        
}
echo "<br>";

}
echo "La suma de las tiradas es $suma";
switch ($suma) {
    case 2:
        $image = "cerdo";
        break;
    case 3:
        $image = "oveja";
        break;
    case 4:
        $image = "panda";
        break;
    case 5:
        $image = "rana";
        break;
    case 6:
        $image = "raton";
        break;
    case 7:
        $image = "tigre";
        break;
    case 8:
        $image = "vaca";
        break;
    case 9:
        $image = "leon";
        break;
    case 10:
        $image = "elefante";
        break;
    case 11:
        $image = "oso";
        break;
    case 12:
        $image = "hipopotamo";
        break;
}
echo "<br />";
echo "<img src='./imagenes/animales/" . $image . ".jpg' />";
echo "<a href='./ejercicio_8.php'>Repetir tirada</a>";

?>
</body>
