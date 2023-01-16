<?php
require("libs/bGeneral.php");
require("libs/config.php");
$tittle = "Valid Form!";
cabecera($tittle);
?>
<h3>Bienvenido!</h3>
<h5>Has completado el formulario correctamente!</h5>
<?php
    $name = recoge("name");
    $age = recoge("age");
    $file=recoge ("file");
    echo "Tu nombre de usuario: ".$name."<br>";
    echo "Tu edad: $age <br>";
    /**
     * Comprobamos si lo que se ha enviado es un fichero para poderlo mostrar
     */
    echo (is_file ($file))?"Tu fichero $file se ha subido con éxito <br> <img src=\"$file\">":"";



pie();
?>