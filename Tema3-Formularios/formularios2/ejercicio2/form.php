
<p>
    <?php foreach ($errors as $error){
    echo "<br>Error: ".$error."<br>";
    }
?>
</p>

<form action="" method="POST">
    NOMBRE <input type="text" name="nombre">
    <br>
    <br>
    <p>
        <input type="radio" name="dados" value="1">1 Dado
        <br>
        <input type="radio" name="dados" value="2">2 Dado
        <br>
        <input type="radio" name="dados" value="3">3 Dado
    </p>
    <input type="checkbox" name="mostrar"> Quiero mostrar mis dados?
    <br><br>
    <input type="button" value="vaciar" name="vaciar">
    <input type="submit" value="aceptar" name="bAceptar">
</form>