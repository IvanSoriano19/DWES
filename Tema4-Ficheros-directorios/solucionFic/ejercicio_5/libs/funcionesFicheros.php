<?php

function insertarArchivoFinal($ruta, $msg)
{
    if ($archivo = fopen($ruta, "a")) {
      if(fwrite($archivo, $msg.PHP_EOL)){
        fclose($archivo);
        return true;
    }
}
return false;
}
  ?>
