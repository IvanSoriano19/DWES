
<h3 class="me-0 text">Bienvenido <?php echo $_SESSION['nombreUsuario']?></h3>
<div class="container-fluid menu text-center p-3 my-4">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ">
			<a href="index.php?ctl=home" class="p-3">INICIO</a>
				<a href="index.php?ctl=listarEjercicios" class="p-3">EJERCICIOS</a>
				<a href="index.php?ctl=buscarPorNombre" class="p-3">BUSCAR POR NOMBRE</a>
				<a href="index.php?ctl=buscarPorGrupoMuscular" class="p-3">BUSCAR POR GRUPO MUSCULAR</a>
				<a href="index.php?ctl=buscarPorEditorial" class="p-3">MIS ENTRENAMIENTOS</a>
				
				<a HREF="index.php?ctl=salir"><button TYPE="button" class="btn btn-secondary mt-3" style="width: 150px;">CERRAR SESIÓN</button></a>

			</div>
		</div>
	</div>
</div>