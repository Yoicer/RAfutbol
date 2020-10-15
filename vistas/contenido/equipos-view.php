<?php
	require_once "./controlador/equipoControlador.php";
	require_once "./controlador/jugadorControlador.php";

	if($_SESSION['tipo_RAF'] == "jugador"){
        $jugador = new jugadorControlador();
		$usuario = $jugador->Obtener_jugadorXidcuentaControlador();
	}

    $equipo = new equipoControlador();
    $equipos = $equipo->obtener_equiposControlador();

    if(isset($_POST['id_eliminar'])){
        $equipo->eliminar_equipoControlador();
    }
?>
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-accounts-alt"></i> EQUIPOS <small><?php echo $_SESSION['tipo_RAF']; ?></small></h1>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
                  <a href="<?php echo SERVERURL; ?>equipos" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EQUIPOS
			  		</a>
                  </li>
<?php
                if( $_SESSION['tipo_RAF'] == "jugador" ){
					if($usuario[0]['equipo_id'] == '0'){
?>
			  	<li>
                  <a href="<?php echo SERVERURL; ?>agregarEquipo" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EQUIPO
			  		</a>
                  </li>
<?php 
					}
				}
?>
			</ul>
		</div>

		<!-- Panel nuevo administrador -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EQUIPOS</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">NOMBRE</th>
									<th class="text-center">UBICACION</th>
									<th class="text-center">ESTADO</th>
									<th class="text-center">LIGA</th>
									<th class="text-center">DESCRIPCION</th>

								</tr>
							</thead>
							<tbody>
                            <?php	  
                                foreach($equipos as $eqp){
                                        echo "<tr>";
                                        echo "<th scope='col'>".$eqp['id_equipo']."</th>";
                                        echo "<th scope='col'>".$eqp['nombre']."</th>";
                                        echo "<th scope='col'>".$eqp['ciudad']."</th>";
                                        echo "<th scope='col'>".$eqp['estado_nombre']."</th>";
                                        echo "<th scope='col'>".$eqp['liga_nombre']."</th>";
                                        echo "<th scope='col'>".$eqp['descripcion']."</th>";
?>
									<td>
                                        <form action="<?php echo SERVERURL; ?>editarEquipo" method="POST">
                                            <input name="id_editar" value="<?php echo $eqp['id_equipo'] ?>" hidden >
											<button type="submit" class="btn btn-info btn-raised btn-xs">
												<i class="zmdi zmdi-edit"></i>
											</button>
										</form>
                                    </td>
                                    <td>
                                        <form action="" method="POST">
                                            <input name="id_eliminar" value="<?php echo $eqp['id_equipo'] ?>" hidden >
											<button type="submit" class="btn btn-danger btn-raised btn-xs">
												<i class="zmdi zmdi-delete"></i>
											</button>
										</form>
                                    </td>
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
