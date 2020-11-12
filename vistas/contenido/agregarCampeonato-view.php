<?php
    require_once "./controlador/c_deportivoControlador.php";

    $c_deportivo = new c_deportivoControlador();
    $id_cuenta = $_SESSION['idCuenta_RAF'];
    $cd = $c_deportivo->Obtener_cdXidcuentaControlador($id_cuenta);
    $id = $cd['id_c_deportivo'];


?>
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-slideshare"></i> CAMPEONATO   </h1>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
                  <a href="<?php echo SERVERURL; ?>campeonatos" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CAMPEONATOS
			  		</a>
                  </li>
<?php
                if( $_SESSION['tipo_RAF'] == "centro deportivo"){
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
        <div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; REGISTRO CAMPEONATO</h3>
        </div>
        <div class="panel-body">
            <form action="<?php echo SERVERURL; ?>ajax/campeonatoAjax.php" method="post" data-form="save" class="FormularioAjax"
            autocomplete="off" enctype="multipart/form-data" >
                <fieldset>
                    <legend><i class="zmdi zmdi-slideshare"></i> &nbsp; Información del campeonato </legend>
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
                                    <label class="control-label">INSCRIPCION $ *</label>
                                    <input class="form-control" type="number" name="inscripcion" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                <label class="control-label">NIVEL</label>
                                    <select class="form-control" name="nivel">
                                        <option value="0"></option>
                                        <option value="0" >NOVATO</option>
                                        <option value="1">INTERMEDIO</option>
                                        <option value="2">AVANZADO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">APERTURA *</label>
                                    <input class="form-control" type="date" name="apertura" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">FINAL *</label>
                                    <input  class="form-control" type="date" name="final" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">DESCRIPCION *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,45}" class="form-control" type="text" name="descripcion" required="" maxlength="30">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <input  name="id_cd" value="<?php echo $cd['id_c_deportivo']; ?>" hidden>
                <br>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> CREAR CAMPEONATO </button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>
        