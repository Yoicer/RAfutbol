<?php
 require_once "./controlador/campeonatoControlador.php";
 $rol = $_SESSION['tipo_RAF'] ;
 $campeonato = new campeonatoControlador();
 $camp = $campeonato->obtener_campeonatoXidControlador();
 var_dump($camp);
?>

<div class="container-fluid">
	<div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-slideshare"></i> CAMPEONATO <small><?php echo $camp['nombre'] ?></small></h1>
        <form action="" method="POST">
            <input name="id_eliminar" value="<?php echo $campt['id_campeonato']; ?>" hidden >
            <button type="submit" class="btn btn-info">
                <i class="zmdi zmdi-arrow-left-bottom"> INSCRIBIRSE</i>
            </button>
        </form>
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