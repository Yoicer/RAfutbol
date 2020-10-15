<?php
    require_once "./controlador/jugadorControlador.php";

    $jugador = new jugadorControlador();
    $usuario = $jugador->Obtener_jugadorXidcuentaControlador();
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
                if( $_SESSION['tipo_RAF'] == "jugador"){
?>
			  	<li>
                  <a href="<?php echo SERVERURL; ?>agregarEquipo" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EQUIPO
			  		</a>
                  </li>
<?php 
                }
?>
			</ul>
        </div>
        <div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; REGISTRO EQUIPO</h3>
        </div>
        <div class="panel-body">
            <form action="<?php echo SERVERURL; ?>ajax/equipoAjax.php" method="post" data-form="save" class="FormularioAjax"
            autocomplete="off" enctype="multipart/form-data" >
                <fieldset>
                    <legend><i class="zmdi zmdi-accounts-alt"></i> &nbsp; Información del equipo</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">NOMBRE *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">CIUDAD *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="ciudad" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">DESCRIPCION *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,45}" class="form-control" type="text" name="descripcion" required="" maxlength="30">
                                    <input hidden name="id_jugador" value="<?php echo $usuario[0]['id_jugador']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> CREAR EQUIPO </button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>
        