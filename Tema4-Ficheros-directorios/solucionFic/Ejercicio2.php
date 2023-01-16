<?php

/*
 * Ejercicio 2 Realiza una función denominada obtenerSuma que reciba una ruta 
 * de archivo como parámetro, lea los números existentes en cada línea del archivo,
 *  y devuelva la suma de todos esos números. Suponemos que el archivo sólo contiene números.
 */


function obtenerSuma($ruta){
  $suma=0;
  //Antes de abrir el fichero, compruebo si existe
  if (is_file($ruta)) {

    //Abro el fichero en modo lectura
    if($archivo = fopen($ruta, "r")){

      while (!feof($archivo)){
        $linea = intval(fgets($archivo));
        $suma+=$linea;
      }
      //Si lo he abierto, lo cierro
      fclose($archivo);
      
    }
  }
    //En cualquier caso devolvemos $suma
      return $suma;
}

echo obtenerSuma ("Ficheros/datosEjercicio.txt");
      ?>