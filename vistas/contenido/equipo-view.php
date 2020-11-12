<?php
	require_once "./controlador/equipoControlador.php";
	require_once "./controlador/jugadorControlador.php";

	
	$equipo = new equipoControlador();
    $id = $usuario[0]['equipo_id'];
	$eqpo = $equipo->obtenerXid_equipoControlador($id);

	$campeonatos = $equipo->obtenerCampeonatos_equipoControlador($id);

	$miembros = $equipo->obtenerMiembros_equipoControlador($id);

	if(isset($_POST['id_eliminar'])){
        $equipo->eliminarJugador_equipoControlador();
	}


?>
<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-accounts-alt"></i> MI EQUIPO <small><?php echo $eqpo['nombre']; ?></small></h1>
	</div>
</div>
<div class="container-fluid">
	<h3 class="list-group-item-heading">CAPITAN <small><?php echo $eqpo['capitan']; ?></small></h3>
	<p class="list-group-item-text">
		<strong>Descripcion: </strong><?php echo $eqpo['descripcion']; ?> <br>
	</p>
</div>
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
			<a href="<?php echo SERVERURL; ?>equipos" class="btn btn-success">
				<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EQUIPOS
			</a>
			<a href="<?php echo SERVERURL; ?>equipo?i=<? echo $usuario[0]['equipo_id'];?>" class="btn btn-info">
				<i class="zmdi zmdi-accounts-alt"></i> &nbsp; MI EQUIPO
			</a>
		
		</li>
	</ul>
</div>
		
	<div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MIEMBROS</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th class="text-center">NOMBRE</th>
								<th class="text-center">POSICION</th>
								<th class="text-center">NIVEL</th>
								<th class="text-center">CELULAR</th>
								<th class="text-center">CIUDAD</th>
							</tr>
						</thead>
						<tbody>
						<?php	  
							foreach($miembros as $mb){
								
									echo "<tr>";
									echo "<th scope='col'>".$mb['nombre']." ".$mb['apellido']."</th>";
									echo "<th scope='col'>".$mb['posicion']."</th>";
									echo "<th scope='col'>".$mb['nivel_nombre']."</th>";
									echo "<th scope='col'>".$mb['celular']."</th>";
									echo "<th scope='col'>".$mb['ciudad']."</th>";
									if($usuario[0]['id_jugador'] == $eqpo['creado_por'] || $usuario[0]['id_jugador'] == $mb['id_jugador'] ){
?>
									<td>
										<form action="" method="POST" >
											<input name="id_eliminar" value="<?php echo $mb['id_jugador'] ?>" hidden >
											<button type="submit" class="btn btn-danger btn-raised btn-xs">
												<i class="zmdi zmdi-delete"></i>
											</button>
										</form>
									</td>	
								</tr>								
<?php                             
									}
								
							}
?>
						</tbody>
					</table>
				</div>
				<nav class="text-center">
					<ul class="pagination pagination-sm">
						<li class="disabled"><a href="javascript:void(0)">«</a></li>
						<li class="active"><a href="javascript:void(0)">1</a></li>
						<li><a href="javascript:void(0)">2</a></li>
						<li><a href="javascript:void(0)">3</a></li>
						<li><a href="javascript:void(0)">4</a></li>
						<li><a href="javascript:void(0)">5</a></li>
						<li><a href="javascript:void(0)">»</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; PARTICIPACION EN CAMPEONATOS</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">CAMPEONATO</th>
							<th class="text-center">INSCRIPCION</th>
							<th class="text-center">APERTURA</th>
							<th class="text-center">FINAL</th>
							<th class="text-center">LIGA</th>
							<th class="text-center">CENTRO DEPORTIVO</th>
							<th class="text-center">DIRECCION</th>
							<th class="text-center">GANADOR</th>
						</tr>
					</thead>
					<tbody>
<?php	  
						foreach($campeonatos as $cp){
							
							echo "<tr>";
							echo "<th scope='col'>".$cp['campeonato'];
							echo "<th scope='col'>".$cp['inscripcion'];
							echo "<th scope='col'>".$cp['fecha_apertura']."</th>";
							echo "<th scope='col'>".$cp['fecha_final']."</th>";
							echo "<th scope='col'>".$cp['liga_nombre']."</th>";
							echo "<th scope='col'>".$cp['cd']."</th>";
							echo "<th scope='col'>".$cp['direccion']." - ".$cp['ciudad']."</th>";
							echo "<th scope='col'>".$cp['ganador']."</th>";
?>	
							</tr>								
<?php                             
							}
?>
					</tbody>
				</table>
			</div>
			<nav class="text-center">
				<ul class="pagination pagination-sm">
					<li class="disabled"><a href="javascript:void(0)">«</a></li>
					<li class="active"><a href="javascript:void(0)">1</a></li>
					<li><a href="javascript:void(0)">2</a></li>
					<li><a href="javascript:void(0)">3</a></li>
					<li><a href="javascript:void(0)">4</a></li>
					<li><a href="javascript:void(0)">5</a></li>
					<li><a href="javascript:void(0)">»</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>
