<?php
$to = "ivansorianobacete@gmail.com";
$subject = "Asunto del email";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$message = "Hola";
if (mail($to, $subject, $message, $headers))
    echo "!!!Enviado!!!"; 
else echo"No enviado";
?>