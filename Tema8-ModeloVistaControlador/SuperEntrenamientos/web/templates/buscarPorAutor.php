<?php ob_start() ?>

<div class="container">
	<form name="formBusquedaAutor" action="index.php?ctl=buscarPorAutor" method="POST">
		<table>
			<tr>
				<td>Autor del libro:</td>
				<td><input TYPE="text" NAME="autor" VALUE="<?php echo $params['autor']?>"></td>
				<td><input TYPE="submit" NAME="buscarPorAutor" VALUE="Buscar"></td>
			</tr>
		</table>
	</form>
</div>

<?php if (count($params['resultado'])>0): ?>
	
<div class="container">
	<div class="row">
	
		<div class="col-md-4">
			<p></p>
		</div>
		
		<div class="col-md-4">
			<table border="1" cellpadding="10">
				<tr align="center">
					<th>Título</th>
					<th>Autor</th>
					<th>Editorial</th>
				</tr>
				<?php foreach ($params['resultado'] as $libro) : ?>
				<tr align="center">
					<td><a href="index.php?ctl=verLibro&idLibro=<?php echo $libro['idLibro'] ?>"> <?php echo $libro['titulo']; ?></a></td>
					<td><?php echo $libro['autor'] ?></td>
					<td><?php echo $libro['editorial'] ?></td>
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