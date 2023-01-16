<?php




function guardarAlPrincipio ($ruta, $msg) {
    $archivo = file_get_contents($ruta);
    $msg=$msg.$archivo;
    file_put_contents($ruta, $msg);
    
}

function insertarArchivoFinal($ruta, $msg){
    if($archivo=fopen($ruta, "a+")){
        fwrite($archivo, $msg.PHP_EOL);
        fclose($archivo);
        return "true";
    }else
        return "false";
}


