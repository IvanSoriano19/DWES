<?php
include ('bGeneral.php');
session_start();
//iniciamos sesión

if (isset ($_SESSION['nombre'])) 
echo "Bienvenido ". $_SESSION['nombre']; 


echo "<p><a href=\"index.php\">Volver al formulario.</a></p>\n";



?>
