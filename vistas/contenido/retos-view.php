<?php
 require_once "./controlador/retoControlador.php";
 $rol = $_SESSION['tipo_RAF'] ;
 $reto= new retoControlador();

?>

<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-inbox"></i> RETOS</h1>
	</div>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
			<a href="<?php echo SERVERURL; ?>retos" class="btn btn-success">
				<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE RETOS <small>ABIERTOS</small>
			</a>
		</li>
<?php
		if( $rol == "jugador"){
?>
		<li>
			<a href="<?php echo SERVERURL; ?>cDeportivos" class="btn btn-info">
				<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO RETO
			</a>
			</li>
<?php 
		}
?>
	</ul>
</div>

<div class="container-fluid">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE RETOS</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">RETADOR</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">APUESTA</th>
                                <th class="text-center">CENTRO DEPORTIVO</th>
                                <th class="text-center">DIRECCION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php	  
                            foreach($reservas as $resv){
                                    echo "<tr>";
                                    echo "<th scope='col'>".$resv['cancha']."</th>";
                                    echo "<th scope='col'>".$resv['superficie']."</th>";
                                    echo "<th scope='col'>".$resv['fecha']."</th>";
                                    echo "<th scope='col'>".$resv['horario']." de la ".$resv['nombre']."</th>";
                                    echo "<th scope='col'>".$resv['c_deportivo']."</th>";

                                    if($_SESSION['tipo_RAF'] != "administrador") {
?>
                                <td>
                                    <form action="" method="POST">
                                        <input name="id_eliminar" value="<?php echo $resv['id_reserva'] ?>" hidden >
                                        <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                            <i class="zmdi zmdi-delete"></i>
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