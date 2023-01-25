<?php
// Inserción de varios registros almacenados en un array. Consulta preparada, marcadores anónimos 

  //Almacenamos varios usuarios en un array
    $usuarios = [
        [
            "Luis",
            date('y-m-d'),
            1000
        ],
        [
            "Ángela",
            date('y-m-d'),
            1200
        ]
    ];
try {
    include ('../conexion.php');
    // Preparamos consulta con marcadores anónimos.
    //Sólo se prepara y se vincula una vez una vez. 
   
    $stmt = $pdo->prepare("INSERT INTO usuario (nombre, fAlta, salario) values (?, ?, ?)");
    $stmt->bindParam(1, $valor0);
    $stmt->bindParam(2, $valor1);
    $stmt->bindParam(3, $valor3);
     
    //Dentro del bucle van cambiando los valores de $valor0, $valor1 y $valor2 y las ejecuciones (execute)
    foreach ($usuarios as $valor){
        $valor0= $valor[0];
        $valor1= $valor[1];
        $valor2= $valor[2];
        // Excecute
        $stmt->execute();
    }
    //Podemos consultar el último id creado, sólo el último
    echo "El id del último usuario dado de alta es: " . $pdo->lastInsertId();
    // Preparamos consulta con marcadores anónimos.
    //Sólo se prepara una vez. Dentro del bucle van las vinculaciones (bind) y las ejecuciones (execute)
   
} catch (PDOException $e) {
    
    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";
}

$db = NULL;
if (isset($errores))
echo $errores['datos'];
?>
