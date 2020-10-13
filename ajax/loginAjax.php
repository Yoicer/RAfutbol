<?php
    $peticionAjax = true;
    require_once "../nucleo/configGeneral.php";

    if(isset($_GET['usuario'])){
         require_once "../controlador/loginControlador.php";
         $logout = new loginControlador();
         echo $logout->cerrar_sesion_controlador();
    }else{
        session_start();
        session_destroy();
        header('Location: '.SERVERURL);
    }
