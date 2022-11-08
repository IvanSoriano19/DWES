<?php 

include "./libs/bGeneral.php";

cabecera();

$nombre = "";
$errors = [];
$provincias = ["valencia", "alicante", "castellon"];
$aficiones = [];


if (!isset($_REQUEST['bAceptar'])) {
    include "./formulario.php";
} else {

    $nombre = recoge("nombre");
    $provincia = recoge("provincia");
    $aficiones = recoge("aficiones");
    $check = recoge("check");

    $check = ($check == "on") ? true : false ;

    cTexto($nombre, "nombre", $errors);
    cRadio($provincia,"provincia", $errors, $provincias);


    if (!empty($errors)) {
        include "./formulario.php";    
    } else {
        
    }
    

}
pie();