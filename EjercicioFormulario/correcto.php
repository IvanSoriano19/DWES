<?php
// require("libs/bGeneral.php");
include('./libs/bGeneral.php');
require("libs/config.php");
$tittle = "Correcto!";
cabecera($tittle);
?>
<h3>Bienvenido!</h3>
<h5>Has completado el formulario correctamente!</h5>
<?php
$titulo = recoge("titulo");
// $sinopsis = recoge("sinopsis");
$generos = recoge("generos");
$file = recoge("file");

echo "El titulo de la pelicula es " . $titulo . "<br>";

// if (is_array($unGeneros) || is_object($unGeneros)) {
    foreach (unserialize($generos) as $genero) {
        echo "<script>console.log('Debug Objects: " . $generos . "' );</script>";
        echo "<p>$genero</p>";
    }
// }

// echo "Sinopsis<br>$sinopsis";


/**
 * Comprobamos si lo que se ha enviado es un fichero para poderlo mostrar
 */
////echo (is_file ($file))?"Tu fichero $file se ha subido con éxito <br> <img src=\"$file\">":"";



pie();
?>