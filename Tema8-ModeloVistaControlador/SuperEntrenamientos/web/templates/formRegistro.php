<?php ob_start() ?>
	
	<div class="container text-center p-4">
		<div class="col-md-12" id="cabecera">
			<h1 class="h1Inicio">REGISTRARSE</h1>
		</div>
	</div>
	
	<div class="container text-center py-2">
		<div class="col-md-12">
			<?php if(isset($params['mensaje'])) :?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $params['mensaje'] ?></span></b>
			<?php endif; ?>
		</div>
		<div class="col-md-12">
			<?php foreach ($errores as $error) {?>
				<b><span style="color: rgba(200, 119, 119, 1);"><?php echo $error."<br>"; ?></span></b>
			<?php } ?>
		</div>
	</div>
	
	<div class="container text-center p-1">
		<form ACTION="index.php?ctl=registro" METHOD="post" NAME="formRegistro" enctype="multipart/form-data">
			<p>* <input TYPE="text" NAME="nombre" VALUE="<?php echo $params['nombre'] ?>" PLACEHOLDER="Nombre"> <br></p>
			<p>* <input TYPE="text" NAME="apellido" VALUE="<?php echo $params['apellido'] ?>" PLACEHOLDER="Apellido"><br></p>
			<p>* <input TYPE="text" NAME="nombreUsuario" VALUE="<?php echo $params['nombreUsuario'] ?>" PLACEHOLDER="Nombre de usuario"><br></p>
			<p>* <input TYPE="email" NAME="correoElectronico" VALUE="<?php echo $params['correoElectronico'] ?>" PLACEHOLDER="Correo Electronico"><br></p>
			<p>* <input TYPE="password" NAME="contrasenya" VALUE="<?php echo $params['contrasenya'] ?>" PLACEHOLDER="Contraseña"><br></p>
			<div class="row">
			<p class="col-md-12">Foto Perfil: <input type="file" name="imagen" id="imagen"/></p>	
			</div>
			<input TYPE="submit" NAME="bRegistro" VALUE="Aceptar"><br>
		</form>
	</div>
		
	<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>