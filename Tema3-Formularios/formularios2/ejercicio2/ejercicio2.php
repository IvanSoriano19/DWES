<?php 

include "./libs/bGeneral.php";

cabecera();
$errors=[];
$nombre = "";
$cDados = array(1,2,3);



if (!isset($_REQUEST['bAceptar'])) {
    require("form.php");
} else {

    $nombre = recoge("nombre");
    $dados = recoge("dados");
    $mostrar = recoge("mostrar");

    $mostrar = ($mostrar == "on") ? true : false ;

    cTexto($nombre, "nombre", $errors);
    cRadio($dados,"dados", $errors, $cDados);


    if (!empty($errors)) {
        require("form.php");
    }else{
        require("form.php");
        for ($i=1; $i <= $dados; $i++) { 
            $jugador1[] = (rand(1,6));
            $jugador2[] = (rand(1,6));
        }

        if ($mostrar) {
            echo "<br><br>Los dados de $nombre son <br>";
            foreach ($jugador1 as $key) {
                echo "<img src='./img/dado/$key.jpg' width='65' height='65'>";
            }
            echo "<br><br>Los dados del ordenador son <br>";
            foreach ($jugador2 as $key) {
                echo "<img src='./img/dado/$key.jpg' width='65' height='65'>";
            }
        } else {
            echo "<br><br>Los dados de $nombre son <br>";
            foreach ($jugador1 as $key) {
                echo "$key   ";
            }
            echo "<br><br>Los dados del ordenador son <br>";
            foreach ($jugador2 as $key) {
                echo "$key   ";
            }

        }

        $total1 = array_sum($jugador1);
        $total2 = array_sum($jugador2);

        $comparacion = $total1 <=> $total2;

        switch ($comparacion) {
            case 0:
                echo "<br>Empate";
                break;
            case 1:
                echo "<br>Gana el $nombre";
                break;
            case -1:
                echo "<br>Gana el ordenador";
                break;
        }
    }
}
pie();
?>