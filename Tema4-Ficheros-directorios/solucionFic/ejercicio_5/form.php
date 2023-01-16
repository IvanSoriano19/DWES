		<?php
foreach ($errores as $error) {
    echo "<br>Error: " . $error . "<br>";
}
?>
		<form ACTION="" METHOD="post" enctype="multipart/form-data">
	Nombre: <input TYPE="text" NAME="name" /><br> 
	Edad: <input TYPE="text" NAME="age" /><br> 
	<input type="file" name="imagen" id="imagen" /><br>
	<input TYPE="submit" name="bAceptar" VALUE="aceptar" />
</form>