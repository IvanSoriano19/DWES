<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<Title>Ejercicio 12</Title>
</head>
<body>

<?php        
$num = 20;
$uno = 0;
$dos = 0;
$tres = 0;
$cuatro = 0;
$cinco = 0;
$seis = 0;
$enlace1 = "../imagenes/dado/1.jpg";
$enlace2 = "../imagenes/dado/2.jpg";
$enlace3 = "../imagenes/dado/3.jpg";
$enlace4 = "../imagenes/dado/4.jpg";
$enlace5 = "../imagenes/dado/5.jpg";
$enlace6 = "../imagenes/dado/6.jpg";
for($i = 0; $i < $num; $i++) {
    $random = rand(1, 6);
   
    switch ($random) {
        case "1":
            $uno++;
            echo "<img src=\"$enlace1\" border=\"0\" width=50px />";
            break;
        case "2":
            echo "<img src=\"$enlace2\" border=\"0\" width=50px />";
            $dos++;
            break;
        case "3":
            echo "<img src=\"$enlace3\" border=\"0\" width=50px />";
            $tres++;
            break;
        case "4":
            echo "<img src=\"$enlace4\" border=\"0\" width=50px />";
            $cuatro++;
            break;
        case "5":
            echo "<img src=\"$enlace5\" border=\"0\" width=50px />";
            $cinco++;
            break;
        case "6":
            echo "<img src=\"$enlace6\" border=\"0\" width=50px />";
            $seis++;
            break;
    }
   
}
echo "<br>";
echo "Han salido $uno unos, $dos doses, $tres treses, $cuatro cuatro, $cinco cincos y $seis seises";
?>

</body>