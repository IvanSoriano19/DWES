<?php
require ("libs/bGeneral.php");
require ("libs/config.php");
require ("libs/funcionesFicheros.php");

cabecera("Bienvenido");
?>
<h3>Bienvenido!</h3>
<h5>Has completado el formulario correctamente!</h5>
<?php
if ($archivo = is_file("datos.txt")) {

    // Abro el fichero en modo lectura
    if ($archivo = fopen("datos.txt", "r")) {

        while (! feof($archivo)) {
            $usuario = fgets($archivo);
            $arrayUsuario = explode(";", $usuario);
            //Si la línea leida está vacia no mostramos
            if (!empty ($arrayUsuario[0])){
                echo "Nombre: $arrayUsuario[0]";
                echo "<br>";
                echo "Edad: $arrayUsuario[1]";
                echo "<br>";
                echo "Imagen: ";
                echo '<img src="' . $rutaImagenes . $arrayUsuario[2] . '" heigth = "200px" width="200px">';
                echo "<br>";
                echo "Fecha Alta:  $arrayUsuario[3]";
                echo "<br>";
            }
        }
        // Si lo he abierto, lo cierro
        fclose($archivo);
    } else
        echo 'no se pudo abrir el archivo';
} else {
    echo "El fichero no existe o no es un fichero";
}
pie();
?>