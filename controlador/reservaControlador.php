<?php
    if($peticionAjax){
        require_once "../modelo/reservaModelo.php";
    }else{
       require_once "./modelo/reservaModelo.php";
    }

    class reservaControlador extends reservaModelo{

        public function obtener_reservasXjugadorControlador($id){
              
            $id_jugador = $id;
            $reservas = reservaModelo::obtener_reservasXjugadorModelo($id_jugador);

            return $reservas;
        }
        
        public function obtener_reservascdControlador($id){
              
            $id_cd = $id;
            $reservas = reservaModelo::obtener_reservascdModelo($id_cd);

            return $reservas;
        }

        public function obtener_reservasControlador(){

            $reservas = reservaModelo::obtener_reservasModelo();

            return $reservas;
        }
        
        public function Obtener_t_reservaControlador(){

            $t_reserva = reservaModelo::Obtener_t_reservaModelo();

            return $t_reserva;
        }
        
        public function eliminar_reservaControlador(){
            $id = $_POST['id_eliminar'];
            if (reservaModelo::eliminar_reservaModelo($id)){
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "Reserva eliminada";
                $alerta['Texto'] = "Se ha cancelado correctamenta la reserva";
                $alerta['Tipo'] = "success";
            }

            echo mainModel::sweet_alert($alerta);

        }

        public function agregar_reservaControlador(){

            $fecha = mainModel::limpiar_cadena($_POST['fecha']);
            $horario = mainModel::limpiar_cadena($_POST['horario']);
            $id_jugador = mainModel::limpiar_cadena($_POST['id_jugador']);
            $id_cancha = mainModel::limpiar_cadena($_POST['id_cancha']);

            $hoy = date("Y-m-d");

            if($hoy > $fecha){
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "La fecha escogida ya ha pasado";
                $alerta['Texto'] = "La fecha escogida para la reserva ya ha pasado, por favor escoga nuevamente la fecha de su reserva";
                $alerta['Tipo'] = "error";
            }else{
            
                $consulta1 = mainModel::ejecutar_consulta_simple("
                                                     SELECT * 
                                                     FROM `reserva` 
                                                     WHERE tipo_reserva_id = $horario AND fecha = '$fecha' AND cancha_id = $id_cancha
                                                    ");

                if($consulta1->rowCount() >= 1){
                    $alerta['Alerta'] = "simple";
                    $alerta['Titulo'] = "Horario o fecha no disponibles";
                    $alerta['Texto'] = "La fecha o el horario escogido no se encuentras disponobles, por favor seleccione otro";
                    $alerta['Tipo'] = "error";
                }else{
                    $datos['fecha'] = $fecha;
                    $datos['horario'] = $horario;
                    $datos['id_jugador'] = $id_jugador;
                    $datos['id_cancha'] = $id_cancha;

                    if(reservaModelo::agregar_reservaModelo($datos)){
                    
                        $alerta['Alerta'] = "simple";
                        $alerta['Titulo'] = "Reserva realizada";
                        $alerta['Texto'] = "La reserva se ha realizado satifastoriamente";
                        $alerta['Tipo'] = "success";
                        
                    }
                }
            }
            return mainModel::sweet_alert($alerta);
        }
    }