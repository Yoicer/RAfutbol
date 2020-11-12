<?php 
	require_once "./controlador/c_deportivoControlador.php";


    $c_deportivo = new c_deportivoControlador();
	$c_deportivos = $c_deportivo->obtener_cDeportivosControlador();
	
	if(isset($_POST['id_eliminar'])){
		$c_deportivo->eliminar_cDeportivoControlador();
	}

?>
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-storage"></i> CENTROS DEPORTIVOS </h1>
    </div>
</div>

<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
                  <a href="<?php echo SERVERURL; ?>cDeportivos" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CENTROS DEPORTIVOS
			  		</a>
                  </li>
<?php
                if( $_SESSION['tipo_RAF'] == "centro deportivo" ){
?>
						<a href="<?php echo SERVERURL; ?>cDeportivo" class="btn btn-info">
							<i class="zmdi zmdi-balance-wallet"></i> &nbsp; MI CENTRO DEPORTIVO
						</a>
<?php
				}
?>
			</ul>
</div>

<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CENTROS DEPORTIVOS</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
<?php
					foreach($c_deportivos as $cd ){
?>

                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top"  style="width: 18rem;" src="<?php echo SERVERURL; ?>vistas/assets/img/cd.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $cd['nombre']; ?></h5>
								<p class="card-text"><?php echo $cd['descripcion']; ?></p>
								<p class="card-text"><?php echo $cd['direccion']. " ".$cd['ciudad']; ?></p>
								<form action="<?php echo SERVERURL; ?>cDeportivo" method="POST"> 
									<input name="id" value="<?php echo $cd['id_c_deportivo'] ?>" hidden >
									<button type="submit" class="btn btn-primary">VER</button>
								</form>
<?php
								if($_SESSION['tipo_RAF'] == "administrador" ){
?>
								<form action="" method="POST"> 
									<input name="id_eliminar" value="<?php echo $cd['id_c_deportivo'] ?>" hidden >
									<button type="submit" class="btn btn-primary">ELIMINAR</button>
								</form>
<?php							}
?>
                            </div>
						</div>
						&nbsp&nbsp
<?php
					}
?>
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
</div>