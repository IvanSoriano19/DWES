<nav class="navbar navbar-expand-lg menu bg-body-tertiary">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php?ctl=home">INICIO</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php?ctl=listarEjercicios">EJERCICIOS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php?ctl=buscarPorNombre">BUSCAR POR NOMBRE</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php?ctl=buscarPorGrupoMuscular">BUSCAR POR GRUPO MUSCULAR</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php?ctl=mostrarMisEjercicios">MIS EJERCICIOS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php?ctl=insertarEjercicio">INSERTAR EJERCICIO</a>
				</li>
			</ul>
			<ul class="d-flex" style="list-style: none; color:white">
				<li><a href="#" class="nav-link mt-1"><?php echo '<img width="50px" height="50px" src="data:image/png;base64,' . base64_encode($_SESSION["fotoPerfil"]) . ' ">' ?> <?php echo $_SESSION['nombreUsuario'] ?></a></li>
				<li><a HREF="index.php?ctl=salir" class="nav-link mt-3">CERRAR SESIÓN</a></li>
			</ul>
		</div>
	</div>
</nav>