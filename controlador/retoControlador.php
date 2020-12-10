<?php
    if($peticionAjax){
        require_once "../modelo/retoModelo.php";
    }else{
       require_once "./modelo/retoModelo.php";
    }

    class retoControlador extends retoModelo{

        public function agregar_retoControlador(){

            $apuesta = mainModel::limpiar_cadena($_POST['apuesta']);
            $reta = mainModel::limpiar_cadena($_POST['reta']);
            $id_jugador = mainModel::limpiar_cadena($_POST['id_jugador']);
            $fecha = mainModel::limpiar_cadena($_POST['fecha']);
            $horario = mainModel::limpiar_cadena($_POST['horario']);
            $id_cancha = mainModel::limpiar_cadena($_POST['id_cancha']);
            
            $reserva = mainModel::ejecutar_consulta_simple("SELECT * FROM `reserva`");
            
            $id_reserva =($reserva->rowCount())+1;

            $hoy = date("Y-m-d");
            if($hoy > $fecha){
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "La fecha escogida ya ha pasado";
                $alerta['Texto'] = "La fecha escogida para la reserva ya ha pasado, por favor escoga nuevamente la fecha de su reserva";
                $alerta['Tipo'] = "error";
            }else{
        
                $datos['apuesta'] = $apuesta;
                $datos['reta'] = $reta;
                $datos['id_jugador'] = $id_jugador;
                $datos['id_reserva'] = $id_reserva;

                if(retoModelo::agregar_retoModelo($datos)){
                
                    $alerta['Alerta'] = "simple";
                    $alerta['Titulo'] = "Reto realizado";
                    $alerta['Texto'] = "El reto se ha creado satifastoriamente";
                    $alerta['Tipo'] = "success";   
                }
                
            }
            return mainModel::sweet_alert($alerta);
        }

        public function obtener_retosXjugadorControlador(){
              
            $retos = retoModelo::obtener_retosXjugadorModelo();

            return $retos;
        }
    }