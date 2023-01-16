<!--IMPORTANTE
No ejecutes este fichero directamente. Se carga desde ejercicio2.php con un include
-->

<p>
<?php

foreach ($errores as $error){
    echo "<br>Error: ".$error."<br>";
}
?>
</p>
<form ACTION="" METHOD="POST">
<p>Nombre: <input TYPE="text" name="nombre"></p>
<p>
<?php
/*
* Vamos a generar dinamicamente (pintar) tanto el grupo radiobutton como los check
* utilizando sendas funciones que reciben el array con los valores.
* Estas funciones están en componentes.php
*/
	pintaRadio($provincias, "provincias");
?>
</p>
<p>
<?php

	pintaCheck($aficiones, "aficiones");
?>
</p>

	<input TYPE="submit" name="Clear" VALUE="Limpiar"><input TYPE="submit" name="bAceptar" VALUE="Enviar">
</form>