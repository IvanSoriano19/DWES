<?php ob_start() ?>

<div class="container mt-4" align="center">

    <h4 class="text-center">Si quieres inscribirte a la newsletter no dudes en hacer click en el boton</h4><br>
    <form action="" method="post">
        <input type="hidden" value="<?php echo $usuario?>">
        <input type="submit" class="button" value="Newsletter" name="newsletter">
    </form>

</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>