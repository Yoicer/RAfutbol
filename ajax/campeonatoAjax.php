<?php
    $peticionAjax = true;
    require_once "../nucleo/configGeneral.php";

    if(isset($_POST['nombre'])){
        require_once "../controlador/campeonatoControlador.php";

        $campeonato = new campeonatoControlador();

        echo $campeonato->agregar_campeonatoControlador();   

    }else{
        session_start();
        session_destroy();
        header('Location: '.SERVERURL);
    }