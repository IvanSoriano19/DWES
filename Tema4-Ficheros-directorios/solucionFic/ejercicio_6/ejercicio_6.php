<?php
include ("funciones.php");
include ("bGeneral.php");
$ruta = "comentarios.txt";
$errores = [];
include ("formularioEjercicio6.php");
if (isset($_POST["boton"])) {

    /*
     * Guardamos el comentario con <br> para luego mostrarlo
     * Otra opción sería guardarlo con saltos de línea pero tendríamos que tenerlo en cuenta
     * creando un separador de comentario único para guardar en fichero
     */
    $comentario = recoge("comentario");
    $comentario = str_replace(PHP_EOL, "</br>", $comentario);
    $nombre = recoge("nombre");
    $email = recoge("email");

    if ($comentario === "") {
        $errores["NoComentario"] = "No hay un comentario para guardar<br>";
    }

    if ($nombre === "") {
        $errores["NoName"] = "El campo nombre es obligatorio<br>";
    }

    if ($email === "") {
        $errores["NoEmail"] = "El campo email es obligatorio<br>";
    }
    cTexto($nombre, $errores);
    cMail($email, $errores);

    if (count($errores) === 0) {
        $fecha = date("d-m-y");
        $texto = "$nombre;$email;$fecha;$comentario" . PHP_EOL;
        guardarAlPrincipio($ruta, $texto);
    }
  
 
}
  // Muestro comentarios
if ($archivo = is_file($ruta)) {
    
    // Si hubiesemos guardado el fichero con saltos de línea
    // en el comentario la lectura sería de otra forma
    if ($archivo = fopen($ruta, "r")) {
        echo "<h2>Mostrar todos los comentarios</h2>";
        while (! feof($archivo)) {
            $usuario = fgets($archivo);
            $arrayUsuario = explode(";", $usuario);
            // Si la línea leida está vacia no mostramos
            if (! empty($arrayUsuario[0])) {
                echo "Nombre: $arrayUsuario[0]";
                echo "<br>";
                echo "Email: $arrayUsuario[1]";
                echo "<br>";
                echo "Fecha: $arrayUsuario[2]";
                echo "<br>";
                echo "Comentario:  $arrayUsuario[3]";
                echo "<br>";
            }
        }
        // Si lo he abierto, lo cierro
        fclose($archivo);
    }
}
