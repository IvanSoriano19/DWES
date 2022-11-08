<!DOCTYPE html>
<html lang="es">

<head>
    <title>ejercicio1</title>
    <meta charset="utf-8" />
</head>

<body>
    <?PHP
    echo "<pre>";
    print_r($_REQUEST);
    echo "<pre>";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


    if ($_REQUEST['numero'] % 2 == 0) {
        echo "El numero es par";
    }else{
        echo "El numero es impar";
    }
    ?>
</body>

</html>