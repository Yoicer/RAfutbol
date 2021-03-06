<?php
    require_once "./controlador/campeonatoControlador.php";
	$rol = $_SESSION['tipo_RAF'] ;
    $campeonato = new campeonatoControlador();
	$campeonatos = $campeonato->obtener_campeonatosControlador();

	if($rol == "centro deportivo"){
		require_once "./controlador/c_deportivoControlador.php";

		$c_deportivo = new c_deportivoControlador();
		$id_cuenta = $_SESSION['idCuenta_RAF'];
		$cd = $c_deportivo->Obtener_cdXidcuentaControlador($id_cuenta);
		$id_cd = $cd['id_c_deportivo'];

	}

    if(isset($_POST['id_eliminar'])){
        $campeonato->eliminar_campeonatoControlador();
	}
	
?>
<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-slideshare"></i> CAMPEONATOS </h1>
	</div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
			<a href="<?php echo SERVERURL; ?>campeonatos" class="btn btn-success">
				<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CAMPEONATOS <small>ABIERTOS</small>
			</a>
		</li>
<?php
		if( $rol == "centro deportivo"){
?>
		<li>
			<a href="<?php echo SERVERURL; ?>agregarCampeonato" class="btn btn-info">
				<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CAMPEONATO
			</a>
			</li>
<?php 
		}
?>
	</ul>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CAMPEONATOS</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">CAMPEONATO</th>
							<th class="text-center">APERTURA</th>
							<th class="text-center">FINAL</th>
							<th class="text-center">$</th>
							<th class="text-center">CENTRO DEPORTIVO</th>
							<th class="text-center">DIRECCION</th>
							<th class="text-center">CIUDAD</th>
							<th class="text-center">LIGA</th>
						</tr>
					</thead>
					<tbody>
					<?php	  
						foreach($campeonatos as $campt){
								echo "<tr>";
								echo "<th scope='col'>".$campt['nombre']."</th>";
								echo "<th scope='col'>".$campt['fecha_apertura']."</th>";
								echo "<th scope='col'>".$campt['fecha_final']."</th>";
								echo "<th scope='col'>".$campt['inscripcion']."</th>";
								echo "<th scope='col'>".$campt['cd_nombre']."</th>";
								echo "<th scope='col'>".$campt['direccion']."</th>";
								echo "<th scope='col'>".$campt['ciudad']."</th>";
								echo "<th scope='col'>".$campt['liga_nombre']."</th>";
								
								if($_SESSION['tipo_RAF'] == "administrador" OR $campt['id_cd'] == $id_cd){
?>
							<td>
								<form action="" method="POST">
									<input name="id_eliminar" value="<?php echo $campt['id_campeonato']; ?>" hidden >
									<button type="submit" class="btn btn-danger btn-raised btn-xs">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</form>
							</td>
<?php
							}
							if($_SESSION['tipo_RAF'] == "jugador" OR $campt['id_cd'] == $id_cd){
?>
								<td>
								<form action="<?php echo SERVERURL; ?>campeonato" method="POST">
									<input name="id_camp" value="<?php echo $campt['id_campeonato']; ?>" hidden >
									<button type="submit" class="btn btn-info btn-raised btn-xs">
										<i class="zmdi zmdi-arrow-left-bottom"></i>
									</button>
								</form>
							</td>
<?php
							}
?>
							</tr>
<?php                             }
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
</div>