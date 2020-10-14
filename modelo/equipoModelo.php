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
                                                                THEN 'Principiante'
                                                    WHEN '2'
                                                                THEN 'Intermedio'
                                                    WHEN '3'
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
    }