<?php
include ("bGeneral.php");

/**
 * session_start debe aparecer en todas las páginas que vayamos a hacer uso de las sesiones
 * Arranca la sesión sino existe o recupera la que tengamos creada
 **/
session_start();
cabecera('Ejemplo 1');

$_SESSION["nombre"] = "Pepe";

//Una vez almacenado un valor en la variable de sesión podemos hacer uso de ella

echo "<p>Se ha guardado su nombre ". $_SESSION["nombre"].".</p>";



pie();
?>
