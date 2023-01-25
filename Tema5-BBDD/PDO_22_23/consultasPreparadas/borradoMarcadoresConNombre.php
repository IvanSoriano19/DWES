<?php


$usuario = "luis";
$salario = 1000;

$consulta = "DELETE FROM usuario
    WHERE nombre=:usuario
    AND salario=:salario";
try {
    include ('../conexion.php');
    $stmt = $pdo->prepare($consulta);
    if ($stmt->execute(array(
        ":usuario" => $usuario,
        ":salario" => $salario
    )))

        // Comprobamos cuantas filas se han borrado

        $cuenta = $stmt->rowCount();
    if ($cuenta) {
        echo ("Eliminadas $cuenta filas.\n");
    } else {
        echo "No se ha eliminado ningún registro";
    }
} catch (PDOException $e) {
    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";
}
if (isset($errores))
echo $errores['datos'];
?>