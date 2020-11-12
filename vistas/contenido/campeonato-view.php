<?php
 require_once "./controlador/campeonatoControlador.php";
 $rol = $_SESSION['tipo_RAF'] ;
 $campeonato = new campeonatoControlador();
 $camp = $campeonato->obtener_campeonatoXidControlador();
 $equipos = $campeonato->obtenerEquipos_campeonatoControlador();
 
 if($rol == "jugador"){
    $id_equipo = $usuario[0]['equipo_id'];
    $id_jugador = $usuario[0]['id_jugador'];
 }
if(isset($_POST['id_unirse'])){
    $campeonato->agregarEquipo_campeonatoControlador();
}
?>

<div class="container-fluid">
	<div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-slideshare"></i> CAMPEONATO <small><?php echo $camp['nombre'] ?></small></h1>
        <h4><?php echo"El campeonato se realizara en ".$camp['cd_nombre']." ubicado en la ".$camp['direccion']." ".$camp['ciudad'].", la inscripcion tiene un precio de ".$camp['inscripcion']." y los equipos se podran inscribir hasta el ".$camp['fecha_apertura']; ?></h4>
<?php
        if($rol == "jugador"){
?>
        <form action="" method="POST">
            <input name="id_unirse" value="<?php echo $camp['id_campeonato']; ?>" hidden >
            <input name="id_equipo" value="<?php echo $id_equipo; ?>" hidden >
            <input name="id_jugador" value="<?php echo $id_jugador; ?>" hidden >
            <button type="submit" class="btn btn-info">
                <i class="zmdi zmdi-arrow-left-bottom"> INSCRIBIRSE</i>
            </button>
        </form>
<?php
        }
?>
    </div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
			<a href="<?php echo SERVERURL; ?>campeonatos" class="btn btn-success">
				<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EQUIPOS <small>INSCRITOS</small>
			</a>
	    </li>
	</ul>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; EQUIPOS</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">NOMBRE</th>
							<th class="text-center">LIGA</th>
							<th class="text-center">UBICACION</th>
							<th class="text-center">CAPITAN</th>
						</tr>
					</thead>
					<tbody>
					<?php	  
						foreach($equipos as $eqp){
								echo "<tr>";
								echo "<th scope='col'>".$eqp['equipo']."</th>";
                                echo "<th scope='col'>".$eqp['liga_nombre']."</th>";
                                echo "<th scope='col'>".$eqp['ciudad']."</th>";
								echo "<th scope='col'>".$eqp['capitan']."</th>";
								
								if($_SESSION['tipo_RAF'] != "jugador"){
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
						}
?>
							</tr>

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