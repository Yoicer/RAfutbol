<?php
    if($peticionAjax){
        require_once "../modelo/equipoModelo.php";
    }else{
       require_once "./modelo/equipoModelo.php";
    }

    class equipoControlador extends equipoModelo{

        public function obtener_equiposControlador(){

            $equipos = equipoModelo::obtener_equiposModelo();

            return $equipos;
        }

        public function eliminar_equipoControlador(){
            
            $id_equipo = $_POST['id_eliminar'];
            if( equipoModelo::eliminar_equipoModelo($id_equipo)){
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "Equipo eliminado";
                $alerta['Texto'] = "Se ha eliminado correctamente el equipo";
                $alerta['Tipo'] = "error";
                echo mainModel::sweet_alert($alerta);
  
            }
        }

        public function obtenerXid_equipoControlador($id){

            $id_equipo = $id;
            $equipo = equipoModelo::obtenerXid_equipoModelo($id_equipo);

           return $equipo;
        }

        public function obtenerMiembros_equipoControlador($id){

            $id_equipo = $id;
            $miembros = equipoModelo::obtenerMiembros_equipoModelo($id_equipo);
           return $miembros;
        }

        public function asignarJugador_equipoControlador(){

            $datos['id_equipo'] = $_POST['id_unirse'];
            $datos['id_jugador'] = $_POST['id_jugador'];

            if(equipoModelo::asignarJugador_equipoModelo($datos)){
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "Jugador agregado al equipo";
                $alerta['Texto'] = "Se ha agregado al equipo correctamente";
                $alerta['Tipo'] = "success";
            }
            echo mainModel::sweet_alert($alerta);

        }
        
        public function eliminarJugador_equipoControlador(){

            $id_jugador = $_POST['id_eliminar'];;

            if(equipoModelo::eliminarJugador_equipoModelo($id_jugador)){
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "Jugador eliminado del equipo";
                $alerta['Texto'] = "Se eliminado el jugador del equipo correctamente";
                $alerta['Tipo'] = "success";
            }
            echo mainModel::sweet_alert($alerta);

        }

        public function agregar_equipoControlador(){

            $nombre = mainModel::limpiar_cadena($_POST['nombre']);
            $descripcion = mainModel::limpiar_cadena($_POST['descripcion']);
            $ciudad = mainModel::limpiar_cadena($_POST['ciudad']);
            $id_jugador = mainModel::limpiar_cadena($_POST['id_jugador']); 

            
            $consulta1 = mainModel::ejecutar_consulta_simple("
                                                    SELECT nombre FROM equipo WHERE nombre = $nombre"
                                                );

                if($consulta1->rowCount() >= 1){
                    $alerta['Alerta'] = "simple";
                    $alerta['Titulo'] = "Nombre de equipo ocupado";
                    $alerta['Texto'] = "El nombre que ha ingresado para su equipo no esta disponible";
                    $alerta['Tipo'] = "error";
                }else{
                    $datosEquipo['nombre'] = $nombre;
                    $datosEquipo['descripcion'] = $descripcion;
                    $datosEquipo['ciudad'] = $ciudad;
                    $datosEquipo['id_jugador'] = $id_jugador;
                    
                    
                    $consulta2 = mainModel::ejecutar_consulta_simple(" SELECT id_equipo FROM equipo");
                    $id_equipo =($consulta2->rowCount())+1;

                    $datosJugador['id_jugador'] = $id_jugador;
                    $datosJugador['id_equipo'] = $id_equipo;
                    
                    
                    if(equipoModelo::agregar_equipoModelo($datosEquipo)){
                        if(equipoModelo::asignarJugador_equipoModelo($datosJugador)){
                            $alerta['Alerta'] = "simple";
                            $alerta['Titulo'] = "Equipo creado";
                            $alerta['Texto'] = "El equipo se ha creado correctamente";
                            $alerta['Tipo'] = "success";
                        }
                    }
                }
            return mainModel::sweet_alert($alerta);
        }

        public function obtenerCampeonatos_equipoControlador($id){
            $id_equipo = $id;
            $campeonatos = equipoModelo::obtenerCampeonatos_equipoModelo($id_equipo);
           return $campeonatos;
        }
           

    }