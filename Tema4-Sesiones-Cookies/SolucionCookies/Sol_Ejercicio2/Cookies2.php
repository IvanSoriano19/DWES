<?php
include ("bGeneral.php");

$errores=[];

if (isset($_REQUEST['Crear'])) {
    
    $segundos = campoNumero("segundos", $errores);
    
    if (! count($errores)) {
        setcookie("galleta", "galleta de tiempo limitado", time() + $segundos);
        
    }
    
} else {
    
    if (isset($_REQUEST['Comprobar'])) {
        if (isset($_COOKIE['galleta'])) {
            echo strip_tags($_COOKIE['galleta']);
        } else {
            echo "No existe información sobre la cookie.";
        }
    }
    
    if (isset($_REQUEST['Destruir'])) {
        if (isset($_COOKIE['galleta'])) {
            setcookie("galleta", "galleta sin tiempo", time() - 60);
            echo "Cookie destruida.<br>";
        } else
            echo "No había cookie que destruir";
    }
   
}

include ("fcookie.php");

?>
