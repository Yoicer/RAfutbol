<?php
    if($peticionAjax)
    {
        require_once "../nucleo/mainModel.php";
    }else
    {
        "./nucleo/mainModel.php";
    }

    class campeonatoModelo extends mainModel
    {
        protected static function obtener_campeonatosModelo(){
            $sql = mainModel::conectar()->prepare("
                                                    SELECT 
                                                    c.id_campeonato, c.nombre, c.inscripcion, 
                                                    c.fecha_apertura, c.fecha_final, c.descripcion, 
                                                    cd.nombre AS cd_nombre, cd.direccion, cd.ciudad, 
                                                    cd.capacidad,
                                        CASE c.estado
                                                WHEN '0'
                                                THEN 'Abierto'
                                                WHEN '1'
                                                    THEN 'Cerrado'
                                                END AS estado_nombre,
                                        CASE c.tipo
                                                WHEN '0'
                                                        THEN 'Novato'
                                                WHEN '1'
                                                    THEN 'Intermedio'
                                                WHEN '2'
                                                    THEN 'Avanzado'
                                                END AS liga_nombre
                                        FROM campeonato as c
                                        INNER JOIN c_deportivo as cd
                                             on c.c_deportivo_id = cd.id_c_deportivo
                                        WHERE c.estado = 0

                                                ");

            $sql->execute();
            return $sql;
        }

        protected static function agregar_campeonatoModelo($datos){
            $sql = mainModel::conectar()->prepare("
                                                    INSERT INTO campeonato 
                                                    (
                                                        nombre, 
                                                        inscripcion, 
                                                        fecha_apertura, 
                                                        fecha_final, 
                                                        estado, 
                                                        tipo, 
                                                        descripcion, 
                                                        ganador, 
                                                        c_deportivo_id
                                                    )
                                        VALUES 
                                        (
                                            :nombre, 
                                            :inscripcion, 
                                            :apertura, 
                                            :final, 
                                            '0', 
                                            '0', 
                                            :descripcion, 
                                            'null', 
                                            :id_cd
                                        );
                                                ");
            $sql->bindParam(':nombre', $datos['nombre']);   
            $sql->bindParam(':inscripcion', $datos['inscripcion']);
            $sql->bindParam(':apertura', $datos['apertura']);   
            $sql->bindParam(':final', $datos['final']); 
            $sql->bindParam(':descripcion', $datos['descripcion']);   
            $sql->bindParam(':id_cd', $datos['id_cd']);                                   

            $sql->execute();

            return $sql;
        }
    }