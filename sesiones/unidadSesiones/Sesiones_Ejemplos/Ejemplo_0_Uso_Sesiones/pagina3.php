<?php
session_start();
/*
 * Eliminamos las variables de sesión
 * Cerramos la sesión
 */
session_unset ();
session_destroy();
if (isset($_SESSION["nombre"])) {
    echo "<p>Su nombre es $_SESSION[nombre].</p>";
} else {
    echo "<p>No sé su nombre.</p>";
}

?>
