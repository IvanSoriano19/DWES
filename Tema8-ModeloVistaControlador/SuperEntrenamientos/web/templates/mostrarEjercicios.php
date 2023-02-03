<?php ob_start() ?>

<table>
	<tr>
		<th><h4><b>Títulos</b></h4><br></th>		
	</tr>
	
	<?php foreach ($params['nombre'] as $ejercicio) :?>
	<tr>
		<td><a href="index.php?ctl=verEjercicio&id_ejercicio=<?php echo $ejercicio['id_ejercicio']?>" class="tablaP">
		<?php echo $ejercicio['nombre'] ?></a></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>