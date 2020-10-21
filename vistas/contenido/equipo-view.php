<?php
	require_once "./controlador/equipoControlador.php";
	require_once "./controlador/jugadorControlador.php";

	

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
			  			<i class="zmdi zmdi-plus"></i> &nbsp; CREAR EQUIPO
			  		</a>
                  </li>
<?php 
					}else{
?>
						<a href="<?php echo SERVERURL; ?>equipo?i=<? echo $usuario[0]['equipo_id'];?>" class="btn btn-info">
							<i class="zmdi zmdi-accounts-alt"></i> &nbsp; MI EQUIPO
						</a>
<?php
					}
				}
?>
			</ul>
		</div>