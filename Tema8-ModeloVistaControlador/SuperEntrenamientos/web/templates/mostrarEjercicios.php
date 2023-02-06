<?php ob_start() ?>
<div class="container mt-4" align="center">
	<table class="">
	<tr>
		<th><h4><b>Ejercicios</b></h4><br></th>		
	</tr>
	
	<?php foreach ($params['nombre'] as $ejercicio) :?>
	<tr>
		<td><a  class="tablaP" href="index.php?ctl=verEjercicio&id_ejercicio=<?php echo $ejercicio['id_ejercicio']?>">
		<?php echo $ejercicio['nombre'] ?></a></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>