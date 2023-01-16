<!DOCTYPE html> 
<html lang="es">
<head>

<meta http-equiv="Content-Type-quot" content="text/html; charset=utf-8">
<title>Ejercicio 1 </title>
</head>
<body>

<?php 
//Escribe un programa que muestre las caras de dos dos tiradas de dados al azar cada vez que se
//ejecute, indique el resultado total e indique que jugador ha obtenido mayor puntuación.
//La página tendrá un enlace que pulsándolo se volverá a ejecutar la tirada.

$jugador1=rand(1,6);
$jugador2=rand(1,6);

$ruta1="../imagenes/dado/$jugador1.jpg";
$ruta2="../imagenes/dado/$jugador2.jpg";

if($jugador1>$jugador2){
    $a= "El jugador 1 tiene más puntuación";
    
}
else if($jugador1<$jugador2){
    $a= "El jugador 2 tiene más puntuación";
    
}
else{
    $a= "Teneis la misma puntuación";
}

?>
<h1>Jugador1</h1>
<img src="<?php echo $ruta1 ?> "width="50px" height="50px"/> 
<h1>Jugador2</h1>
<img src="<?php echo $ruta2 ?> "width="50px" height="50px"/> 
<hr>
<p><em><?php echo $a ;?></em> </p>

 echo "<a href='ejemplo6.php'>Repetir tirada</a>";