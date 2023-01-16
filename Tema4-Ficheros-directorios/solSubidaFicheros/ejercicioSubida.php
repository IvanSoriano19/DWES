<?php
require("libs/bGeneral.php");
//De config.php leeremos $extensionesValidas, $rutaImagenes, $maxFichero.
require("libs/config.php");

cabecera("Ejercicio subir fichero adjunto");
$errores = [];

if (!isset($_REQUEST['bAceptar'])) {
    // Incluimos formulario vacio
    require("form.php");
} else {


    $name = recoge("name");
    $age = recoge("age");
    $error = false;
    //Validamos los campos que no son ficheros
    cTexto($name, "nombre", $errores, 40, 1);
    cNum($age, "edad", $errores, 150);

    //Sino ha habido errores en el resto de campos comprobamos el fichero
    if (empty($errores)) {
        /**
         * En este caso la subida del fichero es obligatoria
         **/
            $file = cfile("imagen",  $errores, $extensionesValidas, $rutaImagenes, $maxFichero);
        
        /**
         * Sino ha habido error en la subida del fichero redireccionamos a valid.php pasando por GET (URL) los datos recogidos
         * Si ha habido error volveremos a mostrar el formulario
         **/
        if (empty($errores)) {
            header("location:valid.php?name=$name&age=$age&file=$file");
        } else {
            require ("form.php");
        }
    } else {
        require("form.php");
    }
}
pie();
