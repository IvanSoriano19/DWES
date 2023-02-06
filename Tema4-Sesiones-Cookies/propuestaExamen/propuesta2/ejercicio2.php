<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

$coches = array(
    "c34" => "Volvo",
    "c37" => "Saaab",
    "c23" => "Mercedes",
    "c11" => "Audi"
);

function generarSelect($coches){

    foreach ($coches as $modelo => $marca) {
        echo "<option value=".$modelo.">$marca</option>";
    }
}





?>
<body>
    
    <form action="" method="post">
        <select name="coches">
            <?php 
                generarSelect($coches);
            ?>
        </select>
    </form>

</body>
</html>