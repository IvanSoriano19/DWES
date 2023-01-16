<form action="" method="POST">
    NOMBRE  <input type="text" name="nombre" value="<?php isset($nombre) ? $nombre : "" ?>">

    <?php
    echo (isset($errores['nombre'])) ? "$errores[nombre] <br>" : "";
    ?>

    <br>
    EDAD  <input type="text" name="edad" value="<?php isset($edad) ? $edad : "" ?>">

    <?php
    echo (isset($errores['edad'])) ? "$errores[edad] <br>" : "";
    ?>
    <br><br>
    <input type="submit" value="aceptar" name="bAceptar">
</form>