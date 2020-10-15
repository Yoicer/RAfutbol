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
                                            INSERT INTO `equipo` (
                                                nombre, apellido, celular, nivel, cedula, ciudad, posicion, 
                                                cuenta_id_cuenta, equipo_id_equipo 
                                                 )
                                            VALUES (
                                                :nombre,
                                                :apellido,
                                                :celular,
                                                '0',
                                                :cedula,
                                                :ciudad,
                                                :posicion,
                                                :id_cuenta,
                                                '0'  
                                            );"
                                        );
                $sql->bindParam(':nombre',$datos['nombre']);
                $sql->bindParam(':apellido',$datos['apellido']);
                $sql->bindParam(':celular',$datos['celular']);
                $sql->bindParam(':cedula',$datos['cedula']);
                $sql->bindParam(':ciudad',$datos['ciudad']);
                $sql->bindParam(':posicion',$datos['posicion']);
                $sql->bindParam(':id_cuenta',$datos['id_cuenta']);
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