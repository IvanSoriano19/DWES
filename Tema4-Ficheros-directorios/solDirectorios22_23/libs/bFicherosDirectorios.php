<?php


/**
 * 
 * funcion devuelveFicheros
 * Función que recorre y devuelve un array con el nombre de los archivos contenidos en un directorio.
 * Realiza una función devuelveFicheros que recorre un directorio devolviendo los nombres de los archivos que contiene, 
 * sólo nombre de los archivos no directorios. 
 * Devolvemos un array y false en caso de error.
 * 
 * @param string $path
 * @return array|bool
 */

function devuelveFicheros($path)
{
       
    if (is_dir($path)) {
        $arbol = [];
        if ($dir = opendir($path)) {
            while ($elemento = readdir($dir)) {
                if (is_file($path .DIRECTORY_SEPARATOR. $elemento)) {
                    $arbol[] = $path .DIRECTORY_SEPARATOR. $elemento;
                }
            }
            closedir($dir);
            // Sino es un directorio o no se ha podido abrir devuelve false
            return $arbol;
        }
    }

    return false;
}
/**
 * funcion devuelveDirectorios   
 * Esta función es parecida a la anterior pero devuelve en el array los nombres 
 * de los directorios que contiene
 * 
 *  
 * @param string $path
 * @return array|bool
 */

function devuelveDirectorios($path)
{
    // Ponemos el caracter "/" al final del path sino lo tiene para poder montar bien la ruta
    
    if (is_dir($path)) {
        $arbol = [];
        if ($dir = opendir($path)) {
            while ($elemento = readdir($dir)) {
                if (is_dir($path .DIRECTORY_SEPARATOR. $elemento)&&($elemento!=".")&&($elemento!="..")) {
                    $arbol[] = $elemento;
                }
            }
            closedir($dir);
            // Sino es un directorio o no se ha podido abrir devuelve false
            return $arbol;
        }
    }

    return false;
}



/**
 * 
 * funcion devuelveDirSubdir
 * Función recorre directorio y subdirectorios. Realiza una función devuelveDirSubdir
 * que recorre un directorio y sus subdirectorios devuelve el nombre de los ficheros con la ruta completa
 * a la que pertenecen. Sólo funciona con dos niveles del arbol de directorios.
 * 
 * @param string $path
 * @return array|bool
 */
/*
function devuelveDirSubdir($path)
{

    $arbol = [];
    if (is_dir($path)) {
        if ($dir = opendir($path)) {
            while ($elemento = readdir($dir)) {
                if ($elemento != "." && $elemento != "..") {
                    if (is_dir($path .DIRECTORY_SEPARATOR. $elemento)) {

                        $arbol = array_merge($arbol, devuelveFicheros($path .DIRECTORY_SEPARATOR. $elemento));
                    } else {
                        $arbol[] = $path .DIRECTORY_SEPARATOR. $elemento;
                    }
                }
            }
            closedir($dir);
            return $arbol;
        }
    }
    return false;
}
*/
/*
*******************Otra version
*/

/**
 * 
 * funcion devuelveDirSubdir
 * Función recorre directorio y subdirectorios. Realiza una función devuelveDirSubdir
 * que recorre un directorio y sus subdirectorios devuelve el nombre de los ficheros con la ruta completa
 * a la que pertenecen. Sólo funciona con dos niveles del arbol de directorios.
 * 
 * @param string $path
 * @return array|bool
 */
function devuelveDirSubdir($path)
{

    $arbol = [];
    if (is_dir($path)) {
        $arbol = devuelveFicheros("imagenes");
        $directorios=devuelveDirectorios("imagenes");
        foreach($directorios as $directorio){
            $arbol = array_merge($arbol, devuelveFicheros($path .DIRECTORY_SEPARATOR. $directorio));
        }
            
            return $arbol;
        
    }
    return false;
}


/*
 * funcion devuelveDirSubdirRecursiva
 * 
 * Función recorre directorio y subdirectorios. Realiza una función devuelveDirSubdir
 * que recorre un directorio y sus subdirectorios devuelve el nombre de los ficheros que
 * contienen cada uno de ellos, sin discriminar donde está contenido cada uno de ellos.
 * Devolvemos el nombre con la ruta completa. no importa el número de niveles del árbol de directorios
 * ******************************** RECURSIVA***************************************
  * 
 * 
 * @param string $path
 * @return array|bool
 */

function devuelveDirSubdirRecursiva($path)
{
  
    $arbol = [];
    if (is_dir($path)) {
        $dir = opendir($path);
        while ($elemento = readdir($dir)) {
            if ($elemento != "." && $elemento != "..") {
                if (is_dir($path .DIRECTORY_SEPARATOR. $elemento)) {

                    $arbol = array_merge($arbol, devuelveDirSubdirRecursiva($path .DIRECTORY_SEPARATOR. $elemento));
                } else {
                    $arbol[] = $path .DIRECTORY_SEPARATOR. $elemento;
                }
            }
        }
        closedir($dir);
        return $arbol;
    } else {
        return false;
    }
}

/**
 * 
 * funcion eliminarDirectorio
 * Función que elimina un directorio. Elimina todo el contenido y lo borra
 * 
 * @param string $path
 * @return bool
 */

function eliminarDirectorio($path)
{

    if (is_dir($path)) {
        $arbol = [];
        if ($dir = opendir($path)) {
            while ($elemento = readdir($dir)) {
                if ($elemento != "." && $elemento != "..") {
                if (is_file($path .DIRECTORY_SEPARATOR. $elemento)) {
                    unlink($path .DIRECTORY_SEPARATOR. $elemento);
                }
                else{
                    eliminarDirectorio($path .DIRECTORY_SEPARATOR. $elemento);
                }
              }
            }
            rmdir($path);
            closedir($dir);
            // Sino es un directorio o no se ha podido abrir devuelve false
            return true;
        }
    }

    return false;
}

?>




