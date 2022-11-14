<?php
foreach ($errores as $error) {
    echo "<br>Error: " . $error . "<br>";
}
?>
<form ACTION="" METHOD="post" enctype="multipart/form-data">

    <p>Titulo: <input type="text" name="titulo" required></p>
    <p>Fecha de estreno: <input type="date" name="fecha" id=""></p>

    <p>
        <?php
        printCheck($generos, "genero");
        ?>
    </p>
    <p>Duracion de la pelicula <input type="number" name="duracion" placeholder="En minutos"></p>
    <p>
        <?php
        printDesplegable($paises, "pais");
        ?>
    </p>
    <p>Sinopsis: <br><textarea name="sinopsis" cols="30" rows="5" placeholder="Sinopsis" ></textarea></p>

<!--<br>
    Foto cartel: <input type="file" name="imagen" id="imagen" />
    <br>
    <p>
    Foto reparto 1: <input type="file" name="imagen" id="imagenReparto1"/>
    </p>
    <p>
    Foto reparto 2: <input type="file" name="imagen" id="imagenReparto2"/>
    </p> -->


    <input TYPE="submit" name="bAceptar" VALUE="aceptar"/>




</form>