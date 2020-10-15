<?php
    require_once "./controlador/reservaControlador.php";
    require_once "./controlador/jugadorControlador.php";

    $reserva = new reservaControlador();

    if($_SESSION['tipo_RAF'] == "jugador"){
        $jugador = new jugadorControlador();
        $usuario = $jugador->Obtener_jugadorXidcuentaControlador();

        $id = $usuario[0]['id_jugador'];
        $reservas = $reserva->obtener_reservasXjugadorControlador($id);
    }else{
        $reservas = $reserva->obtener_reservasControlador();
    }
    

    if(isset($_POST['id_eliminar'])){
       # $equipo->eliminar_reservaControlador();
    }
?>
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-calendar"></i> RESERVAS <small><?php echo $_SESSION['tipo_RAF']; ?></small></h1>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
                  <a href="<?php echo SERVERURL; ?>reservas" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE RESERVAS
			  		</a>
                  </li>
<?php
                if( $_SESSION['tipo_RAF'] == "jugador"){
?>
			  	<li>
                  <a href="<?php echo SERVERURL; ?>agregarReserva" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA RESERVA
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
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE RESERVAS</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">CANCHA</th>
									<th class="text-center">SUPERFICIE</th>
									<th class="text-center">FECHA</th>
									<th class="text-center">CENTRO DEPORTIVO</th>
									<th class="text-center">DIRECCION</th>
                                    <th class="text-center">CIUDAD</th>
                                    <th class="text-center">CAPACIDAD</th>
								</tr>
							</thead>
							<tbody>
                            <?php	  
                                foreach($reservas as $resv){
                                        echo "<tr>";
                                        echo "<th scope='col'>".$resv['cancha']."</th>";
                                        echo "<th scope='col'>".$resv['superficie']."</th>";
                                        echo "<th scope='col'>".$resv['fecha']."</th>";
                                        echo "<th scope='col'>".$resv['c_deportivo']."</th>";
                                        echo "<th scope='col'>".$resv['direccion']."</th>";
                                        echo "<th scope='col'>".$resv['ciudad']."</th>";
                                        echo "<th scope='col'>".$resv['capacidad']." PERSONAS</th>";
?>
									<td>
                                        <form action="<?php echo SERVERURL; ?>editarReserva" method="POST">
                                            <input name="id_editar" value="<?php echo $resv['id_reserva'] ?>" hidden >
											<button type="submit" class="btn btn-info btn-raised btn-xs">
												<i class="zmdi zmdi-edit"></i>
											</button>
										</form>
                                    </td>
                                    <td>
                                        <form action="" method="POST">
                                            <input name="id_eliminar" value="<?php echo $resv['id_reserva'] ?>" hidden >
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
