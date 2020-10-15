<?php
    if($peticionAjax){
        require_once "../nucleo/mainModel.php";
    }else{
       require_once "./nucleo/mainModel.php";
    }

    class equipoModelo extends mainModel{

        protected static function obtener_equiposModelo(){
            $sql = mainModel::conectar()->prepare("
                                                    SELECT *,
                                                    CASE equipo.estado
                                                                WHEN '1'
                                                                THEN 'Activo'
                                                                WHEN '2'
                                                                THEN 'Inactivo'
                                                            END AS estado_nombre,
                                                    CASE equipo.liga
                                                        WHEN '0'
                                                            THEN 'Novato'
                                                         WHEN '1'
                                                                THEN 'Intermedio'
                                                         WHEN '2'
                                                                THEN 'Avanzado'
                                                            END AS liga_nombre
                                                    FROM equipo
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
                                                        ciudad
                                                    )
                                                VALUES (
                                                    :nombre, 
                                                    '0', 
                                                    '0', 
                                                    :descripcion, 
                                                    :ciudad
                                                );  
                                            );"
                                        );
                $sql->bindParam(':nombre',$datos['nombre']);
                $sql->bindParam(':descripcion',$datos['descripcion']);
                $sql->bindParam(':ciudad',$datos['ciudad']);
                $sql->execute();
                return $sql;
        }

        protected static function asignarJugador_equipoModelo($datos){
            $sql = mainModel::conectar()->prepare("
                                            UPDATE jugador 
                                            SET
                                            equipo_id = :id_equipo
                                            WHERE id_jugador = :id_jugador AND equipo_id = '0';
                                                ");
            $sql->bindParam(':id_equipo',$datos['id_equipo']);
            $sql->bindParam(':id_jugador',$datos['id_jugador']);
            
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
        
        protected static function listar_equipoModelo($datos){
                $sql = mainModel::conectar()->prepare("SELECT * FROM `equipo`"
                                        );
                
                $sql->bindParam(':nombre',$datos['nombre']);
                $sql->bindParam(':estado',$datos['estado']);
                $sql->bindParam(':descripcion',$datos['descripcion']);
                $sql->bindParam(':id_equipo',$datos['id_equipo']);
                
                $sql->execute();
                
                return $sql;
        }
        
        protected static function obtener_equipoXid($id_equipo){
            
            $sql = mainModel::conectar()->prepare("
                                                 SELECT * FROM equipo
                                                    WHERE id_equipo = :id_equipo
                                                ");
            $sql->bindParam(':id_equipo',$id_equipo);
            
            $sql->execute();
           
            return $sql->fetchAll();

        }
    }