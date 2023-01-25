<?php

$usuario = 'Miguel';
$consulta = "select * FROM usuario
    WHERE nombre=:usuario";
try {
    include ('../conexion.php');
    //$pdo es la conexión a la BD
    $resultado = $pdo->prepare($consulta);
    if ($resultado->execute(array(
        ":usuario" => $usuario
    ))) {
        // Recorremos el objeto con foreach aunque no es un array. Interfaz Traversable
        foreach ($resultado as $row) {

            echo $row['id'] . "<br> ";
            echo $row['nombre'] . "<br>";
            echo $row['fAlta'] . "<br>";
            echo $row['activo'] . "<br>";
        }
    }
    // Con fetchAll(PDO::FETCH_ASSOC) convertimos el resultado en array asociativo
    // Utilizamos parámetros sin nominar

    echo "Ahora muestro los resultados con fetchAll() y parámetros anónimos</br>";
    $consulta = "select * FROM usuario WHERE nombre=?";
    $resultado = $pdo->prepare($consulta);
    $resultado->bindParam(1, $usuario);
    if ($resultado->execute()) {
        $arrayResultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($arrayResultado as $row) {
            echo $row['id'] . "<br> ";
            echo $row['nombre'] . "<br>";
            echo $row['fAlta'] . "<br>";
            echo $row['activo'] . "<br>";
        }
    }
    // Con fetch(PDO::FETCH_ASSOC) recorremos todas las filas del resultado. Cada una como array asociativo
    // Utilizamos parámetros con nombre
    echo "Ahora muestro los resultados con fetch() y parámetros con nombre</br>";
    $consulta = "select * FROM usuario WHERE nombre=:usuario";
    $resultado = $pdo->prepare($consulta);
    $resultado->bindParam(":usuario", $usuario);
    if ($resultado->execute()) {
        // $stmt->setFetchMode(PDO::FETCH_ASSOC);

        # Mostramos los resultados.
        # Fijaros que se devuelve un objeto cada vez que se lee una fila del recordset.
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {

            echo $row['id'] . "<br> ";
            echo $row['nombre'] . "<br>";
            echo $row['fAlta'] . "<br>";
            echo $row['activo'] . "<br>";
        }
    }
} catch (PDOException $e) {

    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";
}

?>