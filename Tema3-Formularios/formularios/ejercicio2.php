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

    for ($i=1 ; $i <=10  ; $i++) { 

        $multiplicacion = $_REQUEST['numero'] * $i;
        echo "$_REQUEST[numero] x $i = $multiplicacion <br>";
    }
    ?>
</body>

</html>