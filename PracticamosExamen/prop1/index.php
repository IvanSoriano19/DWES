<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
     // Comprobamos si el usuario ha aceptado el aviso de cookies, y por lo tanto existe la cookie acepto_cookies
     if(!isset($_COOKIE["acepto_cookies"])){
        // Mostramos el aviso de uso de cookies
        echo '<div class="container-fluid menu text-center p-3 my-4">
                <div class="container">
                    <div class="row">
                        <form METHOD="post" NAME="cookie">
                            <div class="col-md-12">
                                <span><b> Utilizamos cookies para mejorar tu experiencia.</b></span> <input TYPE="submit" NAME="bAceptarCookie" VALUE="Aceptar"><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
        //Cuando el usuario haga click en "bAceptarCookie", creamos la cookie
        if (isset($_POST['bAceptarCookie'])){
            //cramos una cookie que caduca a los 10 minutos
            setcookie("acepto_cookies", "true", time() + 300);
            //recagamos la página en la que estemos
            header("Location: ".$_SERVER['PHP_SELF']);
        }
    }
    ?>
    
</body>

</html>