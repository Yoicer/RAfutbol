<?php
    if($peticionAjax){
        require_once "../nucleo/mainModel.php";
    }else{
       require_once "./nucleo/mainModel.php";
    }

    class equipoModelo extends mainModel{

        protected static function obtener_equiposModelo(){
            $sql = mainModel::conectar()->prepare("
                                                SELECT equipo.id_equipo,
                                                    equipo.nombre,
                                                    equipo.ciudad,
                                                    equipo.descripcion,
                                                    jg.nombre AS capitan,                           
                                                    CASE equipo.liga
                                                        WHEN '0'
                                                            THEN 'Novato'
                                                        WHEN '1'
                                                                THEN 'Intermedio'
                                                        WHEN '2'
                                                                THEN 'Avanzado'
                                                
                                                            END AS liga_nombre,
                                                    COUNT(jugador.id_jugador) AS miembros
                                                FROM equipo
                                                LEFT JOIN jugador
                                                            ON jugador.equipo_id = equipo.id_equipo 
                                                INNER JOIN jugador AS jg
                                                            ON jg.id_jugador = equipo.creado_por
                                                WHERE equipo.estado = 1
                                                GROUP BY equipo.id_equipo
                                    ");
            $sql->execute();

            return $sql;
        }

        protected static function eliminar_equipoModelo($id_equipo){
            $sql = mainModel::conectar()->prepare("
                                                DELETE FROM `equipo`
                                                WHERE ((`id_equipo` = :id_equipo));
                                                ");
            $sql->bindParam(':id_equipo', $id_equipo);
            $sql->execute();

            return $sql;
        }
        
        protected static function agregar_equipoModelo($datos){
                $sql = mainModel::conectar()->prepare("
                                                INSERT INTO equipo
                                                    (
                                                        nombre, 
                                                        estado, 
                                                        liga, 
                                                        descripcion, 
                                                        ciudad,
                                                        creado_el,
                                                        creado_por
                                                    )
                                                VALUES (
                                                    :nombre, 
                                                    '1', 
                                                    '0', 
                                                    :descripcion, 
                                                    :ciudad,
                                                    now(),
                                                    :id_jugador
                                                );  
                                            );"
                                        );
                $sql->bindParam(':nombre',$datos['nombre']);
                $sql->bindParam(':descripcion',$datos['descripcion']);
                $sql->bindParam(':ciudad',$datos['ciudad']);
                $sql->bindParam(':id_jugador',$datos['id_jugador']);
                $sql->execute();
                return $sql;
        }

        protected static function asignarJugador_equipoModelo($datos){
            $sql = mainModel::conectar()->prepare("
                                            UPDATE jugador 
                                            SET
                                            equipo_id = :id_equipo
                                            WHERE id_jugador = :id_jugador;
                                                ");
            $sql->bindParam(':id_equipo',$datos['id_equipo']);
            $sql->bindParam(':id_jugador',$datos['id_jugador']);
            
            $sql->execute();
           
            return $sql;
        }

        protected static function eliminarJugador_equipoModelo($id_jugador){
            $sql = mainModel::conectar()->prepare("
                                                UPDATE jugador 
                                                SET
                                                equipo_id = 0
                                                WHERE id_jugador = :id_jugador;
                                                ");
            $sql->bindParam(':id_jugador',$id_jugador);

            $sql->execute();

            return $sql;

        }
        
        protected static function actualizar_equipoModelo($datos){
                
            $sql = mainModel::conectar()->prepare("UPDATE `equipo` SET "
                        . "`nombre` = :nombre, "
                        . "`estado` = :estado, `liga` = :liga, "
                        . "`descripcion` = :descripcion"
                        . " WHERE `equipo`.`id_equipo` = :id_equipo");
                
                
                $sql->bindParam(':nombre',$datos['nombre']);
                $sql->bindParam(':estado',$datos['estado']);
                $sql->bindParam(':descripcion',$datos['descripcion']);
                $sql->bindParam(':id_equipo',$datos['id_equipo']);
                
                $sql->execute();
                
                return $sql;
        }
        
        protected static function obtenerMiembros_equipoModelo($id){

            $sql = mainModel::conectar()->prepare("
                                                SELECT *,
                                                CASE nivel
                                                        WHEN '0'
                                                            THEN 'Novato'
                                                        WHEN '1'
                                                                THEN 'Intermedio'
                                                        WHEN '2'
                                                                THEN 'Avanzado'
                                                
                                                            END AS nivel_nombre
                                                FROM `jugador`
                                                WHERE equipo_id = :id_equipo
                                                ");

            $sql->bindParam(':id_equipo',$id);
            $sql->execute();

            return $sql;
        }

        protected static function obtenerXid_equipoModelo($id_equipo){
            
            $sql = mainModel::conectar()->prepare("
                                    SELECT equipo.nombre,
                                        equipo.ciudad,
                                        equipo.descripcion,
                                        equipo.creado_el,
                                        equipo.creado_por,
                                        jugador.nombre AS capitan,
                                        CASE liga
                                            WHEN '0'
                                                THEN 'Novato'
                                                WHEN '1'
                                                    THEN 'Intermedio'
                                            WHEN '2'
                                                    THEN 'Avanzado'
                                        END AS liga_nombre
                                    FROM equipo
                                    INNER JOIN jugador
                                        ON jugador.id_jugador = equipo.creado_por
                                            WHERE equipo.id_equipo = :id_equipo
                                                ");
            $sql->bindParam(':id_equipo',$id_equipo);

            $sql->execute();
           
            return $sql->fetch();

        }
    }