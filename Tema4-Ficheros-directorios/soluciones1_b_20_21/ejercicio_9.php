<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 9</title>
</head>
<body>
<?php
$tabla = 10;
echo "<table border=1 cellspacing=0 width=200>";
echo "<tr>
  <th colspan=5>Tabla del $tabla  </th>
   </tr>";
// generamos la tabla
for($i=1; $i<=10; $i++){
    echo "<tr>
        <td align=center>$tabla X $i </td>
        <td align=center> ". ($tabla*$i) . "</td>
        </tr>";
}
    echo "</table>";
?>
</body>
</html>