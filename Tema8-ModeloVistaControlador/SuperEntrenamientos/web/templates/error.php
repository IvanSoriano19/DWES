<?php ob_start();
if (isset($params['mensaje'])) {
?>
<b><span style="color: rgba(200, 119, 119, 1);">
<?php
    echo $params['mensaje'];
    echo "</span></b>";
}
?>

<div class="container text-center p-4">
		<h3>Ha habido un error</h3>
</div>
<!-- 
<div class="container text-center p-4">
		<h3>Ha habido un error</h3>
        pulsa aqui para volver<a href="index.php?ctl=inicio">Aqui</a>
</div> -->

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>