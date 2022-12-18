<?php

/**
 * session_start debe aparecer en todas las páginas que vayamos a hacer uso de las sesiones
 * Arranca la sesión sino existe o recupera la que tengamos creada
 **/

session_start();
/**
 * Recuperamos la variable que hemos almacenado en la página anterior
 */
if (isset($_SESSION["nombre"])) {
    echo "<p>Su nombre es: " . $_SESSION["nombre"] . "</p>";
    echo '<a href="pagina3.php">En la siguiente página cerramos la sesión</a>';
}
