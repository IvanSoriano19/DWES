<?php ob_start() ?>

<div class="container mt-4" align="center">
	<form name="formBusquedaGrupoMuscular" action="index.php?ctl=buscarPorGrupoMuscular" method="POST">
		<table>
			<tr>
				<td>Grupo Muscular que quieras buscar</td><br>
			</tr>
			<tr>
				<td><input TYPE="text" NAME="grupoMuscular" VALUE="<?php echo $params['grupoMuscular']?>"><input TYPE="submit" NAME="buscarPorGrupoMuscular" VALUE="Buscar"></td>
			</tr>
		</table>
	</form>
</div>

<?php if (count($params['resultado'])>0): ?>
	
<div class="container mt-4" align="center"">
	<div class="row">
	
		<div class="col-md-4">
			<p></p>
		</div>
		
		<div class="col-md-4">
			<table border="1" cellpadding="10">
				<tr align="center">
					<th>Nombre</th>
					<th>grupoMuscular</th>
				</tr>
				<?php foreach ($params['resultado'] as $ejercicio) : ?>
				<tr align="center">
					<td><a href="index.php?ctl=verEjercicio&id_ejercicio=<?php echo $ejercicio['id_ejercicio']?>" class="tablaP"><?php echo $ejercicio['nombre'] ?></a></td>
					<td><?php echo $ejercicio['grupoMuscular'] ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		
		<div class="col-md-4">
			<p></p>
		</div>
	</div>
</div>

<?php endif; ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>