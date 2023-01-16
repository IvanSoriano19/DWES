<!DOCTYPE html>
<html lang="es">

<head>
    <title>ejercicio3</title>
    <meta charset="utf-8" />
</head>

<body>
    <?PHP
    echo "<pre>";
    print_r($_REQUEST);
    echo "<pre>";

    if (isset($_REQUEST["extras"])) {
        
        foreach($_REQUEST["extras"] as $extra){
            switch ($extra) {
                case 'Suma':
                    $suma = $_REQUEST['numero1'] + $_REQUEST['numero2'];
                    echo "El resultado de realizar ($extra) de los numeros $_REQUEST[numero1] + $_REQUEST[numero2] es $suma<br>";
                    break;
                case 'Resta':
                    $resta = $_REQUEST['numero1'] - $_REQUEST['numero2'];
                    echo "El resultado de realizar ($extra) de los numeros $_REQUEST[numero1] - $_REQUEST[numero2] es $resta<br>";
                    break;
                case 'Producto':
                    $producto = $_REQUEST['numero1'] * $_REQUEST['numero2'];
                    echo "El resultado de realizar ($extra) de los numeros $_REQUEST[numero1] * $_REQUEST[numero2] es $producto<br>";
                    break;
                case 'Cociente':
                    $coeficiente = $_REQUEST['numero1'] / $_REQUEST['numero2'];
                    echo "El resultado de realizar ($extra) de los numeros $_REQUEST[numero1] / $_REQUEST[numero2] es $coeficiente<br>";
                    break;
                default:
                    break;
            }
        }
    } else {

        echo "No has seleccionado ninguna operacion<br>";
        $enlace = "formulario3.html";
        echo "<a href=\"$enlace\"><button>Reintentalo</button></a>";
    }
    

    ?>
</body>

</html>