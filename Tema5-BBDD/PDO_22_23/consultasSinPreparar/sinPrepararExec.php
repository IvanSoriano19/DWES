<?php

/*
 * $pdo->exec("consulta SQL") -> Devolverá el número de registros afectados por la consulta
 * Recomendable paraINSERT, UPDATE o DELETE solo cuando los datos vengan de fuente segura.
 * Como resultado de la ejecución tendríamos en el número de filas afectadas por la instrucción.
 */


$consulta = "INSERT INTO `usuario` (nombre, fAlta, salario, activo) VALUES ('Juana', '2021-11-21', '1000', FALSE)";
// Podemos capturar las exepciones que pueda producir la cosulta

try {
    require ("../conexion.php");
    // Si ejecutamos la consulta con exec, devuelve el número de filas afectadas
    // Exec no sirve con SELECT
    $count = $pdo->exec($consulta);

    if ($count === 1)
        echo "El usuario se ha insertado correctamente <br>";
        //Mostramos el último id insertado utilizando el método de PDO lastInsertId()
    echo "El id del último usuario dado de alta es: ".$pdo->lastInsertId();

    $pdo = NULL;
} catch (PDOException $e) {

    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "## Fichero: " . $e->getFile() . "## Línea: " . $e->getLine() . "##Código: " . $e->getCode() . "##Instante: " . microtime() . PHP_EOL, 3, "../logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";
    // En este caso capturamos el caso de CP o C Alternativa duplicada
    if ($e->getCode() == 23000)
        // Guardamos los mensajes de errores para posteriormente mostrarlos
        $errores['datos'] = "Ya existe ese usuario en la BD";
    else
        $errores['datos'] = "Ha sucedido un error en la inserción";
}
if (isset($errores))
echo $errores['datos'];
?>