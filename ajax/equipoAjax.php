<?php
    $peticionAjax = true;
    require_once "../nucleo/configGeneral.php";

    if(isset($_POST['nombre'])){
        require_once "../controlador/equipoControlador.php";

        $equipo = new equipoControlador();

        echo $equipo->agregar_equipoControlador();   

    }else{
        session_start();
        session_destroy();
        header('Location: '.SERVERURL);
    }