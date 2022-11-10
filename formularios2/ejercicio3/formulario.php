<p>
    <?php 
    foreach ($errors as $error){
        echo "<br>Error: ".$error."<br>";
    }
    ?>
</p>

<form action="" method="post">
    <p>Nombre: <input type="text" name="nombre" placeholder="nombre"></p>
    
    <p>
        <?php 
            printRadio($provincias,"provincias");
        ?>  
    </p>
    <p>
        <?php 
            printCheck($aficiones,"aficiones");
        ?>  
    </p>
    
    
    <!-- <p>  
        <input type="radio" name="provincia" value="valencia" require>Valencia
        <input type="radio" name="provincia" value="alicante" require>Alicante
        <input type="radio" name="provincia" value="castellon" require>Castellon
    </p>
    <p>
        <input type="checkbox" name="aficiones" value="cine">Cine
        <input type="checkbox" name="aficiones" value="deporte">Deporte
        <input type="checkbox" name="aficiones" value="viajar">Viajar
        <input type="checkbox" name="aficiones" value="videojuegos">Videojuegos
    </p> -->
    <p>
        <input type="checkbox" name="check" value="check">Quieres ser premium?
    </p>
    <input type="submit" name="bAceptar" value="Aceptar">

</form>