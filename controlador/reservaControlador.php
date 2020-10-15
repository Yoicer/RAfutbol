<?php
    if($peticionAjax){
        require_once "../modelo/reservaModelo.php";
    }else{
       require_once "./modelo/reservaModelo.php";
    }

    class reservaControlador extends reservaModelo{

        public function obtener_reservasXjugadorControlador($id){
              
            $id_jugador = $id;
            $equipos = reservaModelo::obtener_reservasXjugadorModelo($id_jugador);

            return $equipos;
        }

        public function obtener_reservasControlador(){

            $equipos = reservaModelo::obtener_reservasModelo();

            return $equipos;
        }
    }