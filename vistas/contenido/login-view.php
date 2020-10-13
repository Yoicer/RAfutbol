<div class="full-box login-container cover" style="background-image: url(<?php echo SERVERURL; ?>vistas/assets/img/login.jpeg);">
    <form action="" method="POST" autocomplete="off" class="logInForm">
        <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
        <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
        <div class="form-group label-floating">
            <label class="control-label" for="UserName">Usuario</label>
            <input class="form-control" id="UserName" type="text" name="usuario" required>
            <p class="help-block">Escribe tú nombre de usuario</p>
        </div>
        <div class="form-group label-floating">
            <label class="control-label" for="UserPass">Contraseña</label>
            <input class="form-control" id="UserPass" type="password" name="clave" required>
            <p class="help-block">Escribe tú contraseña</p>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" style="color: #FFF;"> Iniciar sesión</button>
            <a href="<?php echo SERVERURL; ?>registroJugador" style="color: #FFF;">Registarse</a>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        
        require_once "./controlador/loginControlador.php";
        
        $login = new loginControlador();

        echo $login->iniciar_sesion_controlador();

    }
?>