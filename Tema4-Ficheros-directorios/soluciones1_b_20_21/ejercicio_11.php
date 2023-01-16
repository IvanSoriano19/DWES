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
    
for ($tot = 1; $tot != 11; $tot++){
    $dado = rand(1,6);
    if ($dado % 2 == 0){
        $par++;
    }
    else {
        $impar++;
    }
    echo "<img src='./imagenes/dado/$dado.jpg' border='0'>";
    if ($tot == 10){
        echo "<br><br>";
    }
}
    echo "Total de pares: ".$par."<br><br>";
    echo "Total de impares: ".$impar;

?>
</body>
</html>