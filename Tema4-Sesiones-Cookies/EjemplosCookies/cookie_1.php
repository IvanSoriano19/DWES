<?php
/*
 * Con este ejemplo creamos una cookie con nombre nombreCookie con
 * duración 1 minuto
 * setcookie($nombre, $valor, $expiracion, $ruta, $dominio, $seguridad, $solohttp)
 */
setcookie("nombreCookie", "Esta es mi cookie", time() + 60); // Esta cookie se borrará un minuto después de crearla.

/*
 * La primera vez que ejecutamos a este fichero todavía no podemos verla en $_COOKIE porque
 * todavía no la hemos creado.
 * Comprobamos si hay cookie con la función isset
 * El contenido de las cookies no es de confianza ya que vienen del navegador del usuario
 * y son facilmente modificables. Tenemos que utilizar htmlspecialchars o striptags para sanear.
 */
if (isset($_COOKIE['nombreCookie']))
    echo "Este es el contenido de la cookie: ".htmlspecialchars($_COOKIE['nombreCookie']);
else
    echo "La cookie no existe";
?>
