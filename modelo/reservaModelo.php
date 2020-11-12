<?php
    if($peticionAjax){
        require_once "../nucleo/mainModel.php";
    }else{
       require_once "./nucleo/mainModel.php";
    }

    class reservaModelo extends mainModel{

        protected static function obtener_reservasXjugadorModelo($id_jugador){
            $sql = mainModel::conectar()->prepare("
                                        SELECT
                                            r.id_reserva, r.fecha, tr.nombre, tr.horario,
                                            c.nombre AS cancha, c.superficie, cd.nombre AS c_deportivo, 
                                            cd.direccion, cd.ciudad, cd.capacidad
                                        FROM reserva AS r
                                        INNER JOIN tipo_reserva AS tr
                                            ON tr.id = r.tipo_reserva_id
                                        INNER JOIN cancha AS c
                                            ON r.cancha_id = c.id_cancha
                                        INNER JOIN c_deportivo AS cd
                                            ON c.c_deportivo_id = cd.id_c_deportivo
                                        WHERE r.jugador_id =:id
                                                ");
            $sql->bindParam(":id", $id_jugador);
            $sql->execute();
            return $sql;
        }
        
        protected static function obtener_reservascdModelo($id_cd){
            $sql = mainModel::conectar()->prepare("
                                            SELECT
                                                r.id_reserva, r.fecha, tr.nombre, tr.horario,
                                                c.nombre AS cancha, c.superficie, cd.nombre AS c_deportivo, 
                                                cd.direccion, cd.ciudad, cd.capacidad
                                            FROM reserva AS r
                                            INNER JOIN tipo_reserva AS tr
                                                ON tr.id = r.tipo_reserva_id
                                            INNER JOIN cancha AS c
                                                ON r.cancha_id = c.id_cancha
                                            INNER JOIN c_deportivo AS cd
                                                ON c.c_deportivo_id = cd.id_c_deportivo
                                            WHERE cd.id_c_deportivo =:id
                                                ");
            $sql->bindParam(":id", $id_cd);
            $sql->execute();
            return $sql;
        }
        
        protected static function obtener_reservasModelo(){
            $sql = mainModel::conectar()->prepare("
                                        SELECT
                                            r.id_reserva, r.fecha, tr.nombre, tr.horario,
                                            c.nombre AS cancha, c.superficie, cd.nombre AS c_deportivo, 
                                            cd.direccion, cd.ciudad, cd.capacidad
                                        FROM reserva AS r
                                        INNER JOIN tipo_reserva AS tr
                                            ON tr.id = r.tipo_reserva_id
                                        INNER JOIN cancha AS c
                                            ON r.cancha_id = c.id_cancha
                                        INNER JOIN c_deportivo AS cd
                                            ON c.c_deportivo_id = cd.id_c_deportivo
                                                ");
            $sql->execute();
            return $sql;
        }
        protected static function Obtener_t_reservaModelo(){
            $sql = mainModel::conectar()->prepare("
                                                SELECT * 
                                                FROM `tipo_reserva`
                                                ");
            $sql->execute();
            return $sql;
        }

        protected static function agregar_reservaModelo($datos){
            $sql = mainModel::conectar()->prepare("
                                        INSERT INTO `reserva` (
                                            `fecha`, `jugador_id`, `tipo_reserva_id`, `cancha_id`)
                                        VALUES (:fecha, :jugador, :horario, :cancha);
                                                ");
            $sql->bindParam("fecha", $datos['fecha']);
            $sql->bindParam("horario", $datos['horario']);
            $sql->bindParam("jugador", $datos['id_jugador']);
            $sql->bindParam("cancha", $datos['id_cancha']);

            $sql->execute();

            return $sql;
        }
        
        protected static function eliminar_reservaModelo($id){
            $sql = mainModel::conectar()->prepare("
                                            DELETE FROM reserva
                                            WHERE id_reserva = :id
                                            ;");
            $sql->bindParam("id", $id);

            $sql->execute();

            return $sql;
        }
        
    }