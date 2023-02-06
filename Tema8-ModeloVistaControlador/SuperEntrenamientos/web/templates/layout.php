
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>SuperEntrenamientos</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12 p-4">
					<h1 class="text-center"><b>SUPER ENTRENAMIENTOS</b></h1>	
				</div>
				<div class="col-md-1">
				
				</div>
			</div>
		</div>
	</div>
	
	<?php	
	if (!isset($menu)) {
		$menu = 'menuInvitado.php';
	}
	include $menu;
    ?>
    
	<div class="container-fluid">
		<div class="container">
			<div id="contenido">
			<?php echo $contenido ?>
			</div>
		</div>
	</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>