<?php
include('./libs/bGeneral.php');
cabecera();

// array donde almacenaremos el texto de los errores encontrados
$errores = [];
$nombre = "";
$edad = "";
//Valores que puede tener el radio
$valores = array(1, 2, 3);
//Compruebo si se ha pulsado el botón del formulario
if (!isset($_REQUEST['bAceptar'])) {
    /*
Realizamos la carga del formulario en caso de que todavía no tengamos datos que procesar 
(no hemos pulsado el botón del formulario). Sería lo mismo que tener aquí el código del
formulario pero de esta manera el código es más claro y más facil para modificar  y
realizar en equipo
*/
    require("formEjercicio2.php");
} else {

    /* Recogemos todos los campos incluso el radiobutton.
    * En el caso del control radio nos servirá también para poner a "" cuando el usuario no
    * haya seleccionado ninguna opción del radiobutton.
    */
    $nombre = recoge("nombre");
    $check = recoge("imagenes");
    $dados = recoge("dado");

    //Valido check. Si se ha seleccionado (he recibido on) lo pongo a TRUE, a FALSE en caso contrario
    $check = ($check == "on") ? true : false;

    //Valido el campo radiobutton. Los valores pueden ser los que tengo en el array $valores
    cRadio($dados, "dados", $errores, $valores);

    cTexto($nombre, "nombre", $errores);

    //Si hay errores vuelvo a mostrar el formulario 
    if (!empty($errores)) {
        require("formEjercicio2.php");
    } else {
        /*
        * En caso de que no haya errores podemos hacer dos cosas:
            - Realizar aqui el juego y mostrar el formulario para
            poder volver a jugar (es lo hecho en esta solución)
            - Pasar a correcto.php pasándole los datos por URL y realizar alli el juego. 
            En ese caso podríamos poner un enlace a "ejercicio2.php" para permitir volver a jugar
        */
        require("formEjercicio2.php");
        for ($i = 1; $i <= $dados; $i++) {
            $dadosUser[] = (rand(1, 6));
            $dadosMaquina[] = (rand(1, 6));
        }

        //Si se ha seleccionado mostrar imágenes las mostramos sino mostraremos el valor
        if ($check) {
            echo "<br><br>Tus dados $nombre:<br><br> ";
            foreach ($dadosUser as $val) {

                echo "<img src='./img/dado/$val.jpg' width='85' height='85' border='0'>";
            }
            echo "<br><br> Dados de la máquina: <br><br>";
            foreach ($dadosMaquina as $val) {
                echo "<img src='./img/dado/$val.jpg' width='85' height='85' border='0'>";
            }
        } else {
            echo "<br><br>Tus dados:<br><br> ";
            foreach ($dadosUser as $val) {

                echo "$val  ";
            }
            echo "<br><br>Dados de la máquina: <br><br>";
            foreach ($dadosMaquina as $val) {
                echo "$val ";
            }
        }
        echo "<br><br>";
        //Calculamos los totales de cada jugador
        $totalUser = array_sum($dadosUser);
        $totalMaquina = array_sum($dadosMaquina);

        /*
        * Comparamos los dados de usuario y máquina con el operador espacial, nos devuelve 0,1 ó -1 según
        * el resultado de la comparación
        */
        $resultado = $totalUser <=> $totalMaquina;
        switch ($resultado) {
            case 0:
                echo "Empate <br>";
                break;
            case 1:
                echo "Ganaste!!!<br>";
                break;
            case -1:
                echo "Ganó la máquina!!<br>";
                break;
        }
    }
}

pie();
