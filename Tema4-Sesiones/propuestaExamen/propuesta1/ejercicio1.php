<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

function contarLineas($ruta){

    if (is_file($ruta)) {
        if ($documento = fopen($ruta, "r")) {
            $numeroLineas = 0;
            while (!feof($documento)) {
                if(fgets($documento)){
                    $numeroLineas++;
                }
            }
            fclose($documento);
        }
            return $numeroLineas;
    }
    
}

$ruta = "archivo.txt";

echo contarLineas($ruta);

?>
<body>
    
</body>
</html>