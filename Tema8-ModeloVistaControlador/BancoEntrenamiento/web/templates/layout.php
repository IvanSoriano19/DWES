<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Banco Entrenamiento</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">BANCO ENTRENAMIENTO</h1>
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
	
	<div class="container-fluid pie p-2 my-5">
		<div class="container">
			<h5 class="text-center">Entrenamientos funcionales básicos para todo el mundo. <br>Nunca te quedes quieto</h5>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>