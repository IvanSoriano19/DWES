<?php
ob_start();
if (isset($params['mensaje'])) { 
	echo $params['mensaje'] ;
}
    ?>
<b><span style="color: rgba(200, 119, 119, 1);"></span></b>

	<div class="container-fluid">
			<div class="container">
				<div class="row">				
					<div class="col-md-3">
						<p></p>
					</div>
					<div class="col-md-6">
						<h1 class="p-2"><?php echo $params['ejercicios']['nombre']?></h1>
						<table border="1" cellpadding="10">
							<tr align="center">
								<th>Descripcion</th>
								<td><?php echo $params['ejercicios']['descripcion']; ?></td>
							</tr>
							<tr align="center">
								<th>Grupo Muscular</th>
								<td><?php echo $params['ejercicios']['grupoMuscular']; ?></td>
							</tr>
						</table>
						<form class="col-md-8" ACTION="index.php?ctl=agregarEjercicio" method="post">
							<br>
							<p>Quieres añadir el ejercicio a tu rutina? 
							<?php $id_ejercicio = $params['ejercicios']['id_ejercicio']; ?>
							<input type="hidden" name="id_ejercicio" value="<?php echo $id_ejercicio?>">
							<input type="submit" class="btn btn-secondary m-2 col-3" name="agregarEjercicio" value="Añadir"></input></p>
							
						</form>
						
					</div>

					<div class="col-md-3">	            
										
				</div>
			</div>
	</div>


<?php $contenido = ob_get_clean();
include 'layout.php' ?>