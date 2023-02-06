<?php ob_start() ?>


<?php foreach ($params['ejercicios'] as $ejercicio) : ?>
	<div class="container-fluid">
		<div class="container mt-4" align="center">
			<div class="row">
				<div class="col-md-3">
					<p></p>
				</div>
				<div class="col-md-6">
					<h1 class="p-2" align="center"><?php echo $ejercicio['nombre'] ?></h1>
					<table border="1" cellpadding="10">
						<tr align="center">
							<th>Descripcion</th>
							<td><?php echo $ejercicio['descripcion']; ?></td>
						</tr>
						<tr align="center">
							<th>Grupo Muscular</th>
							<td><?php echo $ejercicio['grupoMuscular']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<br>
	<?php endforeach; ?>


	<?php $contenido = ob_get_clean() ?>

	<?php include 'layout.php' ?>