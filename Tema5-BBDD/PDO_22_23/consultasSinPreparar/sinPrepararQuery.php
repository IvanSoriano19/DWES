<?php




try {
    
    include ('../conexion.php');
    // Ejecuta una sentencia SQL
    $consulta = "SELECT * FROM usuario";
    if($resultado = $pdo->query($consulta)){
    /*$resultado es un objeto de la clase PDOStatement. 
     * Implementa la interfaz Traversable, lo que signiﬁca que puede ser recorrida mediante un bucle foreach()
     * sin ser un array
     */
    foreach ($resultado as $row) {
        echo $row['id'] . "<br> ";
        echo $row['nombre'] . "<br>";
        echo $row['fAlta'] . "<br>";
        echo $row['activo'] . "<br>";
        echo "<hr>";
    }
    }
    /*
     *Otra opción sería emplear fetchAll(PDO::FETCH_ASSOC) para obtener todo el resultado en forma de array bidimensional. 
     * En nuetro caso será un array asociativo por el estilo que le hemos pasado.
     * Lo mostramos con print_r
    
    echo "<pre>";
    $arrayResultado=$resultado->fetchAll(PDO::FETCH_ASSOC);
    print_r( $arrayResultado);
    echo "</pre>";
    */
   
    $resultado->closeCursor();
    // Para liberar un resultado simplemente hay que destruir el objeto
    $resultado = NULL; // Opcional
    // Para cerrar una conexión simplemente hay que destruir el objeto
    $pdo = NULL; // Opcional
} catch (PDOException $e) {
    
    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "##Código: " . $e->getCode()."  ".  microtime() . PHP_EOL, 3, "../logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    $errores['datos'] = "Ha habido un error <br>";
   
    
} 