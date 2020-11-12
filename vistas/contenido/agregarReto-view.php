<?php
    require_once "./controlador/reservaControlador.php";

    $reserva = new reservaControlador();
    $t_reserva = $reserva->Obtener_t_reservaControlador();
    $id_cancha = $_POST['id_cancha'];

?>
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-calendar-alt"></i> LANZAR RETO</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-calendar-alt"></i> &nbsp; RETO</h3>
        </div>
        <div class="panel-body">
            <form action="<?php echo SERVERURL; ?>ajax/retoAjax.php" method="post" data-form="save" class="FormularioAjax"
            autocomplete="off" enctype="multipart/form-data" >
                <fieldset>
                    <legend><i class="zmdi zmdi zmdi-calendar"></i> &nbsp;DATOS DEL RETO</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">FECHA *</label>
                                    <input class="form-control" type="date" name="fecha" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">APUESTA *</label>
                                    <input class="form-control" type="number" name="apuesta" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">HORARIO *</label>
                                    
                                        <select class="form-control" id="horario" name="horario" required >
                                        <option></option>
<?php
                                        foreach($t_reserva as $tr){
?>
                                        <option value="<?php echo $tr['id']; ?>"><?php echo $tr['nombre']." de ".$tr['horario']; ?></option>
<?php 
                                        } 
?>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <input hidden name="id_jugador" value="<?php echo $usuario[0]['id_jugador']; ?>">
                        <input hidden name="id_cancha" value="<?php echo $id_cancha; ?>">
                    </div>
                </fieldset>
                <br>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Reservar</button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>
        