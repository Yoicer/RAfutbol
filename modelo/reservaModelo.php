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
                                        r.id_reserva, r.fecha, r.descripcion,
                                        c.nombre AS cancha, c.superficie, cd.nombre AS c_deportivo, 
                                        cd.direccion, cd.ciudad, cd.capacidad
                                    FROM reserva AS r
                                    INNER JOIN partido AS p
                                        ON r.partido_id = p.id_partido
                                    INNER JOIN cancha AS c
                                        ON p.cancha_id = c.id_cancha
                                    INNER JOIN c_deportivo AS cd
                                        ON c.c_deportivo_id = cd.id_c_deportivo
                                    WHERE r.jugador_id = :id
                                                ");
            $sql->bindParam(':id', $id_jugador);
            $sql->execute();
            return $sql;
        }
        
        protected static function obtener_reservasModelo(){
            $sql = mainModel::conectar()->prepare("
                                    SELECT
                                        r.id_reserva, r.fecha, r.descripcion,
                                        c.nombre AS cancha, c.superficie, cd.nombre AS c_deportivo, 
                                        cd.direccion, cd.ciudad, cd.capacidad
                                    FROM reserva AS r
                                    INNER JOIN partido AS p
                                        ON r.partido_id = p.id_partido
                                    INNER JOIN cancha AS c
                                        ON p.cancha_id = c.id_cancha
                                    INNER JOIN c_deportivo AS cd
                                        ON c.c_deportivo_id = cd.id_c_deportivo
                                                ");
            $sql->execute();
            return $sql;
        }
        
    }