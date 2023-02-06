<?php
if (! empty($errores)) {
    foreach ($errores as $error) {
        echo "$error";
        echo "<br>";
    }
}
echo "<br>";
?>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
	<h1>Elija una opción:</h1>
	<form action="" method="post">
		Crear una cookie con una duración de <input type="number"
			name="segundos" min="1" max="120"> segundos(entre 1 y 60) <input
			type="submit" name="Crear" value="Crear">
	</form>
	<form action="Cookies2.php" method="post">
		Comprobar cookie <input type="submit" name="Comprobar"
			value="Comprobar">
	</form>
	<form action="Cookies2.php" method="post">
		Destruir la cookie <input type="submit" name="Destruir"
			value="Destruir">
	</form>

</body>
</html>