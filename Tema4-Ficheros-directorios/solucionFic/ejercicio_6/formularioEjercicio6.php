<?php
require_once ("funciones.php");
require_once ("bGeneral.php");
cabecera("Ejercicio5.php");
if (isset($errores)&&count($errores) === 0) {
    foreach ($errores as $val) {
        echo $val;
    }
}
?>


<form method="post">
	<h1>Libro de visitas</h1>
	<span>Tu comentario:</span><br>
	<textarea name="comentario"></textarea>
	<br> <span>Tu nombre:</span><br> <input type="text" name="nombre"><br>
	<span>Tu e-mail:</span><br> <input type="text" name="email"><br>
	<br> <input type="submit" name="boton" value="Publicar"><br>
</form>

