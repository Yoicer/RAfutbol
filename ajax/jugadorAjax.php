<?php
    $peticionAjax = true;
    require_once "../nucleo/configGeneral.php";

    if(isset($_POST['cedula'])){
        require_once "../controlador/jugadorControlador.php";

        $jugador = new jugadorControlador();

        echo $jugador->agregar_jugadorControlador();      
    }else{
        session_start();
        session_destroy();
        header('Location: '.SERVERURL);
    }
