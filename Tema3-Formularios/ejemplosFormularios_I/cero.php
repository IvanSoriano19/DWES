<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta charset="utf-8" />
</head>
<body>
<?PHP
// Ejemplo sencillo en el que vemos como llegan los datos al servidor

// Mostramos el contenido de $_REQUEST
print_r($_REQUEST);
if (empty($_REQUEST["nombre"])) {
    echo "vacío";
} else
    echo "lleno";

    
   

?>
</body>
</html>