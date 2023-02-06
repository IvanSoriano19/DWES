<?php
// Guardamos la fecha actual para guardarla
$fecha = getdate(time());
$dia = $fecha["mday"] . "/" . $fecha["mon"] . "/" . $fecha["year"];
$hora = $fecha["hours"] . ":" . $fecha["minutes"] . ":" . $fecha["seconds"];

/*
 * Si la cookie "Veces"no existe la creamos por primera vez inicializandola a 1
 * Guardamos tambien dia y hora actual de conexión
 * Para el ejemplo ponemos duración mientras esté abierto el navegador (sin tiempo)
 * La cookie Momento la creamos como un array donde almacenaremos día y hora
 */
if (! isset($_COOKIE["Veces"])) {
    setcookie("Veces", 1);
    setcookie("Momento[Fecha]", $dia);
    setcookie("Momento[Hora]", $hora);
} else {
    /*
     * Si ya existe previamente se incrementa en uno y se actualiza el momento de conexión
     * Vemos que para actualizar el valor de la cookie se hace tambien con setcookie pasándole el nuevo valor
     *
     */
    setcookie("Veces", $_COOKIE["Veces"] + 1);
    setcookie("Momento[Fecha]", $dia);
    setcookie("Momento[Hora]", $hora);
    
    /*
     * Aunque ya hemos modificado con setcookie no será visible en el servidor hasta la siguiente ejecución de la página.
     */
    echo "Te has conectado ". htmlspecialchars($_COOKIE["Veces"]). " veces. La vez anterior fué el día ". htmlspecialchars($_COOKIE["Momento"]["Fecha"])." a las ". htmlspecialchars($_COOKIE["Momento"]["Hora"]);
}
?>
