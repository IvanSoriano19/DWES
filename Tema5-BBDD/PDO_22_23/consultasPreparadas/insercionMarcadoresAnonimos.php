<?php

// Inserción de un registro con consulta preparada con marcadores anónimos

$nombre = "Luis";
    $fAlta = date('y-m-d');
    $salario = 1000;
try {
    include ('../conexion.php');
    // Preparamos consulta
    $stmt = $pdo->prepare("INSERT INTO usuario (nombre, fAlta, salario) values (?, ?, ?)");
    
    // Bind
    
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $fAlta);
    $stmt->bindParam(3, $salario);
    // Excecute
    if ($stmt->execute()) {
        
        echo "El id del último usuario dado de alta es: " . $pdo->lastInsertId();
    } else
        echo "No se ha insertado ningún registro";
} catch (PDOException $e) {

    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";
}
if (isset($errores))
echo $errores['datos'];
$db = NULL;

?>
