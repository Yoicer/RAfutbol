
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA RESERVA</h3>
        </div>
        <div class="panel-body">
            <form>
                <fieldset>
                    <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombres *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Estado *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="estado-reg" id="" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Liga</label>
                                    <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="liga-reg" id="liga" maxlength="15">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Descripcion</label>
                                    <textarea name="descripcion-reg" id="descripcion" class="form-control" rows="2" maxlength="100"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <p class="text-left">
                                    <div class="label label-success">Nivel 1</div> Control total del sistema
                                </p>
                                <p class="text-left">
                                    <div class="label label-primary">Nivel 2</div> Permiso para registro y actualización
                                </p>
                                <p class="text-left">
                                    <div class="label label-info">Nivel 3</div> Permiso para registro
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="optionsPrivilegio" id="optionsRadios1" value="1">
                                        <i class="zmdi zmdi-star"></i> &nbsp; Nivel 1
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="optionsPrivilegio" id="optionsRadios2" value="2">
                                        <i class="zmdi zmdi-star"></i> &nbsp; Nivel 2
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="optionsPrivilegio" id="optionsRadios3" value="3" checked="">
                                        <i class="zmdi zmdi-star"></i> &nbsp; Nivel 3
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                </p>
            </form>
        </div>
    </div>
</div>
