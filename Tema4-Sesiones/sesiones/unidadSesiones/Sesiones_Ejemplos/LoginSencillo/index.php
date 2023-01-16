<?php
include ("bGeneral.php");
session_start();
/*
*Sino se ha logueado el usuario iniciamos sesión y ponemos a usuario no logueado
*/
if(!isset( $_SESSION['acceso'] )){
    $_SESSION['acceso'] = 0;
}
cabecera("Comprobar");

if (isset($_POST['bAceptar'])) {
    //recogemos y comprobamos usuario
    if (! strcmp(recoge("nombre"), "root") && ! strcmp(recoge("clave"), "super")) {
/*
 * Inicializamos variables de sesión. En caso de tener guardaríamos también nivel de usuario
 * En la variable acceso guardamos 1 si el usuario se ha logueado.
 */
        $_SESSION['acceso'] = 1;
        $_SESSION['usuario'] = 'root';
        header("location:privada.php");
    } else
        echo "No son correctos los datos de usuario o contraseña";
}
include ("fAcceso.php");
?>