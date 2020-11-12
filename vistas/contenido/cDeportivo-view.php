<?php
	require_once "./controlador/c_deportivoControlador.php";

    $c_deportivo = new c_deportivoControlador();
    if(isset($_POST['id'])){
		$id = $_POST['id'];
		$cd = $c_deportivo->obtenerXid_c_deportivoControlador($id);
	}
	if($_SESSION['tipo_RAF'] == "centro deportivo"){
		$id_cuenta = $_SESSION['idCuenta_RAF'];
		$cd = $c_deportivo->Obtener_cdXidcuentaControlador($id_cuenta);
		$id = $cd['id_c_deportivo'];
	}
		
	$canchas = $c_deportivo->obtenercanchasControlador($id);
	


?>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-balance-wallet"></i> <?php echo $cd['nombre']; ?></h1>
    </div>
</div>

<div class="container-fluid">
    <ul class="list-group">
		<li><?php echo $cd['descripcion']; ?></li>
		<li><?php echo $cd['direccion']." ".$cd['ciudad']; ?></li>
    </ul>
</div>
<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp CANCHAS </h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
					<?php
					foreach($canchas as $c ){
?>

                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top"  style="width: 18rem;" src="<?php echo SERVERURL; ?>vistas/assets/img/cancha.jpg" alt="Card image cap">
                            <div class="card-body">
								<h5 class="card-title"><?php echo $c['nombre']; ?></h5>
								<p class="card-text"><?php echo $c['descripcion']. ", cuenta con una capacidad para ".$cd['capacidad']." personas"; ?></p>
								<p class="card-text"><?php echo "La cancha cuenta con una superficie ".$c['superficie']; ?></p>
<?php							
								if($_SESSION['tipo_RAF'] == "jugador"){
?>
								<form action="<?php echo SERVERURL; ?>agregarReserva" method="POST"> 
									<input name="id_cancha" value="<?php echo $c['id_cancha'] ?>" hidden >
									<button type="submit" class="btn btn-primary">RESERVAR</button>
								</form>
<?php
								}
								if($_SESSION['tipo_RAF'] == "administrador" ){
?>
								<a href="#" class="btn btn-delete">ELIMINAR</a>
<?php							}
?>
                            </div>
						</div>
						&nbsp&nbsp
<?php
					}
?>
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
    <div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; </h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>