<?php
    $peticionAjax = true;
    require_once "../nucleo/configGeneral.php";

    if(isset($_POST['fecha'])){
        require_once "../controlador/reservaControlador.php";
        require_once "../controlador/retoControlador.php";

        $reserva = new reservaControlador();
        $reto = new retoControlador();
        $reserva->agregar_reservaControlador();
        echo $reto->agregar_retoControlador();


    }else{
        session_start();
        session_destroy();
        header('Location: '.SERVERURL);
    }