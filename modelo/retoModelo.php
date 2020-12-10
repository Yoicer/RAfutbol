<?php
    if($peticionAjax)
    {
        require_once "../nucleo/mainModel.php";
    }else
    {
        "./nucleo/mainModel.php";
    }

    class retoModelo extends mainModel
    {
        protected static function obtener_retosModelo(){
            $hoy = date("Y-m-d");
            $sql = mainModel::conectar()->prepare("
                                    SELECT *
                                    FROM reto AS r
                                    INNER JOIN jugador AS j
                                    ON j.id_jugador = r.creado_por

                                                ");
          //  $sql->bindParam(':hoy', $hoy);

            $sql->execute();
            return $sql;
        }
        
        protected static function agregar_retoModelo($datos){
            $sql = mainModel::conectar()->prepare("
                        INSERT INTO `reto` (
                            `id_retador`, `reserva_id`, `apuesta`, `retado_id`)
                        VALUES (:retador, :reserva, :apuesta, :retado);
                ");

            $sql->bindParam("retador", $datos['id_jugador']);
            $sql->bindParam("reserva", $datos['id_reserva']);
            $sql->bindParam("apuesta", $datos['apuesta']);
            $sql->bindParam("retado", $datos['reta']);
        
            $sql->execute();

            return $sql;
        }
        protected static function obtener_retosXjugadorModelo(){
            $hoy = date("Y-m-d");
            $sql = mainModel::conectar()->prepare("
                                SELECT CONCAT(jg.nombre, jg.apellido) AS retador,
                                             rs.fecha, r.apuesta, cd.nombre AS cd, cd.direccion
                                FROM reto AS r
                                INNER JOIN jugador AS jg
                                    ON r.id_retador = jg.id_jugador
                                INNER JOIN reserva AS rs
                                    ON r.reserva_id = rs.id_reserva
                                INNER JOIN cancha AS c
                                    ON c.id_cancha = rs.cancha_id
                                INNER JOIN c_deportivo AS cd
                                    ON cd.id_c_deportivo = c.c_deportivo_id
                                WHERE r.retado_id = 0 AND rs.fecha > :hoy
                                                ");
            $sql->bindParam(':hoy', $hoy);
            $sql->execute();
            return $sql;
        }
       
 
    }