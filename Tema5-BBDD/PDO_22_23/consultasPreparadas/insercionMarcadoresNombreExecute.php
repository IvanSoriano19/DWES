<?php


//En este caso el array tiene que ser asociativo y coincidir el nombre de los parámetros con los índices
$usuarios = [
   'nombre'=> "Lucía",
    'fAlta'=>date('y-m-d'),
    'salario'=>2500
];
try {
    include ('../conexion.php');
    // Preparamos la consulta
    $stmt = $pdo->prepare("INSERT INTO usuario (nombre, fAlta, salario) values (:nombre,:fAlta,:salario)");
    
    // Vinculamos al ejecutar utilizando el array asociativo
    
    if ($stmt->execute($usuarios))
        echo "El id del último usuario dado de alta es: " . $pdo->lastInsertId();
} catch (PDOException $e) {
    
    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";
}

$db = NULL;

