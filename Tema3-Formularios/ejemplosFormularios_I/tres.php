<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta charset="utf-8" />
</head>
<body>
<?php

/*Vamos a ver como llegan los datos del array de checkbox
*/
print_r($_REQUEST);
echo "<br>";
echo "Comprueba si tus datos son correctos.<br>";
echo "<br>";

//Si el usuarios ha elegido algún extra, lo que llega a $_REQUEST["extras"] es un array

if (isset($_REQUEST["extras"])) {
    foreach($_REQUEST["extras"] as $extra){
        echo "El usuario {$_REQUEST["nombre"]} ha elegido $extra <br>";
    }
}else 
    echo "El usuario no ha elegido ningún extra";

?>
</body>
</html>