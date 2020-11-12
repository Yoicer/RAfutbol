<?php
    $peticionAjax = true;
    require_once "../nucleo/configGeneral.php";

    if(isset($_POST['fecha'])){
        require_once "../controlador/reservaControlador.php";

        $reserva = new reservaControlador();
        echo $reserva->agregar_reservaControlador();   

    }else{
        session_start();
        session_destroy();
        header('Location: '.SERVERURL);
    }