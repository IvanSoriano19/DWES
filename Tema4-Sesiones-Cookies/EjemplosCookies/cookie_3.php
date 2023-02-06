<?php
// Para borrar las cookies asignamos un valor negativo al tiempo
setcookie("nombreCookie", "Vamos a borrarla", time() - 60);

/*
 * Vemos que aunque ya hemos ejecutado setcookie para eliminarla hasta que no se realice otra petición no se verá en el servidor
 *
 * Todavía podemos mostrar el contenido anterior de la cookie
 */
if (isset($_COOKIE['nombreCookie']))
    echo "Este es el contenido de la cookie: " . htmlspecialchars($_COOKIE['nombreCookie']);
else
    echo "La cookie no existe";

?>