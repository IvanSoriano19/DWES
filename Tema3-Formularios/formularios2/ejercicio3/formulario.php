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
    
    <p>
        <input type="checkbox" name="check" value="check">Quieres ser premium?
    </p>
    <input type="submit" name="bAceptar" value="Aceptar">

</form>