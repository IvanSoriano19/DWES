<!DOCTYPE html>
<html>

<head>
<title></title>
</head>

<body>

	<form action="" method="post">
		<input type="submit" name="jugar" value="Jugar"> <input type="submit"
			name="mostrarResultados" value="Mostrar Resultados"> <input
			type="submit" name="reseteo" value="Reseteo">
	</form>

    <?php
    include ("libEjercicio_4.php");

    if (isset($_POST["jugar"])) {

        // Lanzo dados
        $jugador[] = rand(1, 6);
        $jugador[] = rand(1, 6);

        $maquina[] = rand(1, 6);
        $maquina[] = rand(1, 6);
        // Muestro imagenes
        echo "JUGADOR";
        echo '<img src="dado/' . $jugador[0] . '.jpg" heigth = "200px" width="200px" alt="">';
        echo '<img src="dado/' . $jugador[1] . '.jpg" heigth = "200px" width="200px" alt="">';
        echo "<br>";
        echo "MAQUINA";
        echo '<img src="dado/' . $maquina[0] . '.jpg" heigth = "200px" width="200px" alt="">';
        echo '<img src="dado/' . $maquina[1] . '.jpg" heigth = "200px" width="200px" alt="">';
        echo "<br>";

        // Juagamos
        $ganador = jugar($jugador, $maquina);
        // Guardamos resultado
        guardaDato($ganador);

        if (isset($ganador)) {
            switch ($ganador) {
                case (0):
                    echo "EMPATE!!!";
                    break;
                case (1):
                    echo "HAS GANADO!!!!";
                    break;
                case (2):
                    echo "GANA LA MÁQUINA!!!";
            }
        }
    } else if (isset($_POST["mostrarResultados"])) {
        $resultados=mostrarResultados();
        echo "Empate: " . $resultados[0];
        echo "<br>";
        echo "Jugador: " . $resultados[1];
        echo "<br>";
        echo "Maquina: " . $resultados[2];
    } else if (isset($_POST["reseteo"])) {
        reseteo();
    } else {
        // si no ha pulsado ningun boton o entra por primera vez
        reseteo();
    }
    ?>
    <br>


</body>
</html>