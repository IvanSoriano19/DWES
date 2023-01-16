<?php
require ("libs/bGeneral.php");
require ("libs/config.php");
require ("libs/funcionesFicheros.php");

cabecera("Ejercicio subir fichero adjunto");
$errores = [];


if (! isset($_REQUEST['bAceptar'])) {
    // Incluimos formulario vacio
    require ("form.php");
} else {

    $file = "";
    $name = recoge("name");
    $age = recoge("age");
    $error = false;

    if (! cTexto($name, $errores, 40, 1)) {
        $error = true;
    }
    if (! cNum($age, $errores, 150)) {
        $error = true;
    }
    if (! $error) {
        $file = cfile("imagen", $rutaImagenes, $extensionesValidas, $errores);
        if ($file) {
            $cadena = $name . ";" . $age . ";" . $file . ";" . date("d/m/y");
            insertarArchivoFinal("datos.txt", $cadena);
            header("location:Valid.php");
            
        } else {
            require ("form.php");
        }
    } else {
        require ("form.php");
    }
}
pie();
?>