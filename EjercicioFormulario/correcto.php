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
$pais = recoge("pais");
$sinopsis = recogeNormal("sinopsis");
$generos = recoge("generos");
$duracion = recoge("duracion");

$file = recoge("file");
$imagenReparto1 = recoge("imagenReparto1");
$imagenReparto2 = recoge("imagenReparto2");
$date = recoge("fecha");

// $typeDate = cFecha($date);

echo "<p>El titulo de la pelicula es " . $titulo . "</p>";

echo "$date";

echo "<p><b>Genero de la pelicula</b></p>";
foreach (unserialize($generos) as $genero) {
    echo "$genero<br>";
}

echo "<p>La duracion de la pelicula es de <b>$duracion</b> minutos<br>";
$duracionH = minToHour($duracion);
echo "La duracion de la pelicula es de <b>$duracionH</b> horas</p>";

echo "<p>El pais de la pelicula es $pais</p>";

echo "<p><b>Sinopsis</b><br>$sinopsis<br></p>";


/**
 * Comprobamos si lo que se ha enviado es un fichero para poderlo mostrar
 */
echo (is_file($file)) ? "Tu fichero $file se ha subido con éxito <br> <img src=\"$file\">" : "";
echo (is_file($imagenReparto1)) ? "Tu fichero $imagenReparto1 se ha subido con éxito <br> <img src=\"$imagenReparto1\">" : "";
echo (is_file($imagenReparto2)) ? "Tu fichero $imagenReparto2 se ha subido con éxito <br> <img src=\"$imagenReparto2\">" : "";




pie();
?>