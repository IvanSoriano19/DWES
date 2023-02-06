<!doctype html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?php
               
            if (isset($_COOKIE["colores"])) {
                $color=strip_tags($_COOKIE["colores"]);
                
                echo("<p style='color:$color;' >Todo este parrafo deberia de estar coloreado de $color</p>");
                
            } else {
                echo("error al cargar cookie");
                
            }
           echo '<a href="index.php">Volver a inicio</a>';
        ?>
    </body>
</html>