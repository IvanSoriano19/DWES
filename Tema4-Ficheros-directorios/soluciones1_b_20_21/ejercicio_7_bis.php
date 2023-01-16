<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<Title>Ejercicio 7</Title>
</head>
<body>

<?php
$random1 = rand(1,6);
$random2 = rand(1,6);

$random3 = rand(1,6);
$random4 = rand(1,6);

$enlace1 = "..\imagenes\dado\\$random1.jpg";
$enlace2 = "..\imagenes\dado\\$random2.jpg";

$enlace3 = "..\imagenes\dado\\$random3.jpg";
$enlace4 = "..\imagenes\dado\\$random4.jpg";

$ganador;
?>

<div>
<h2>Pareja 1</h2>
<img src= "<?php echo $enlace1; ?>"  width="50px" height="50px">  
<img src= "<?php echo $enlace2; ?>"  width="50px" height="50px">  

<h2>Pareja 2</h2>
<img src= "<?php echo $enlace3; ?>"  width="50px" height="50px">
<img src= "<?php echo $enlace4; ?>"  width="50px" height="50px">  
<?php 

if (($random1 == $random2) && ($random3 == $random4)) {
    if ($random1 > $random3) {
        $ganador = "Pareja 1";
    } else if ($random1 < $random3){
        $ganador = "Pareja 2";
    }else {
        $ganador = "Empate";
    }
} else if (($random1 == $random2) || ($random3 == $random4)) {
    if ($random1 == $random2) {
        $ganador = "Pareja 1";
    } else {
        $ganador = "Pareja 2";
    }
} else {
   $suma1 = $random1 + $random2;
   $suma2 = $random3 + $random4;
   if ($suma1 > $suma2) {
       $ganador = "Pareja 1";
   } else if ($suma1 < $suma2){
       $ganador = "Pareja 2";
   } else {
       $ganador = "Empate";
   }
}

?>
<h2>Ganador: <?php echo $ganador;?></h2>
<a href="ejercicio7_bis.php">TIRAR DE NUEVO</a>

</div>

</body>