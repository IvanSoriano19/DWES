<?php
// Inserción de varios registros almacenados en un array. Consulta preparada, marcadores anónimos

//Almacenamos varios usuarios en un array
$usuarios = [
    [
        "Miguel",
        date('y-m-d'),
        1000
    ],
    [
        "Pepa",
        date('y-m-d'),
        1200
    ]
];
try {
    include ('../conexion.php');
    //PReparamos la consulta sólo una vez
    $stmt = $pdo->prepare("INSERT INTO usuario (nombre, fAlta, salario) values (?, ?, ?)");
    
    // Vinculamos y ejecutamos dentro del bucle
    foreach ($usuarios as $valor){
        $stmt->bindValue(1, $valor[0]);
        $stmt->bindValue(2, $valor[1]);
        $stmt->bindValue(3, $valor[2]);
        // Excecute
        $stmt->execute();
    }
    //Podemos consultar el último id creado, sólo el último
    echo "El id del último usuario dado de alta es: " . $pdo->lastInsertId();
} catch (PDOException $e) {
    
    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";
}

$db = NULL;
?>
