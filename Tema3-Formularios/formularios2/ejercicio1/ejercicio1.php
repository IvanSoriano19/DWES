<?php

include "./libs/bGeneral.php";

cabecera();

$errores=[];
$nombre = "";
$edad = "";

if (!isset($_REQUEST['bAceptar'])) {
    include "form.php";
} else {

    $nombre = recoge("nombre");
    $edad = recoge("edad");

    cTexto($nombre, "nombre", $errores,40);

    cNum($edad, "edad", $errores,true,150);

    if (empty($errores)) {

        // Realizamos la redirección a correcto.php. Le pasamos datos por la URL (GET)
        // En correcto.php recibiremos los datos pasados por la URL y tendremos que sanitizarlos (recogerlos)
        
        

        header("location:correcto.php?nombre=$nombre&edad=$edad");
    } else {
        include ('form.php');
    }

}




?>

<?php

pie();
?>
