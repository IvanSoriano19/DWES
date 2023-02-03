<?php ob_start(); ?>

<div class="container text-center py-2">
	<div class="col-md-12">
		<?php if (isset($params['mensaje'])) : ?>
			<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $params['mensaje'] ?></span></b>
		<?php endif; ?>
	</div>
</div>

<div class="col-md-12">
	<?php foreach ($errores as $error) { ?>
		<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $error . "<br>"; ?></span></b>
	<?php } ?>
</div>

<div class="container">
	<div class="container text-center col-6">
		<form ACTION="index.php?ctl=insertarEjercicio" class="position-center" METHOD="post">
			<p><input TYPE="text" class="form-control" NAME="nombre" PLACEHOLDER="Nombre del ejercicio"><br></p>
			<p><textarea name="descripcion" class="form-control" id="Descripcion" ></textarea></p>
			<p><input TYPE="text" class="form-control" NAME="grupoMuscular" PLACEHOLDER="Grupo muscular"><br></p>
			<input TYPE="submit" name="bInsertarEjercicio" VALUE="Aceptar" PLACEHOLDER="Nombre de usuario"><br>
		</form>
	</div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>