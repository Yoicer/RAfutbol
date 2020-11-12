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
            $hoy = date("Y-m-d");
            $sql = mainModel::conectar()->prepare("
                                                    SELECT 
                                                    c.id_campeonato, c.nombre, c.inscripcion, 
                                                    c.fecha_apertura, c.fecha_final, c.descripcion, 
                                                    cd.id_c_deportivo As id_cd,
                                                    cd.nombre AS cd_nombre, cd.direccion, cd.ciudad, 
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
                                        WHERE c.fecha_apertura > :hoy

                                                ");
            $sql->bindParam(':hoy', $hoy);

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
                                                        c_deportivo_id,
                                                        creado_el
                                                    )
                                        VALUES 
                                        (
                                            :nombre, 
                                            :inscripcion, 
                                            :apertura, 
                                            :final, 
                                            '0', 
                                            :nivel, 
                                            :descripcion, 
                                            'null', 
                                            :id_cd,
                                            now()
                                        );
                                                ");
            $sql->bindParam(':nombre', $datos['nombre']);   
            $sql->bindParam(':inscripcion', $datos['inscripcion']);
            $sql->bindParam(':apertura', $datos['apertura']);   
            $sql->bindParam(':final', $datos['final']); 
            $sql->bindParam(':descripcion', $datos['descripcion']);   
            $sql->bindParam(':id_cd', $datos['id_cd']); 
            $sql->bindParam(':nivel', $datos['nivel']);                                   

            $sql->execute();

            return $sql;
        }

        protected static function eliminar_campeonatoModelo($id){
            $sql = mainModel::conectar()->prepare("
                                        DELETE FROM campeonato
                                        WHERE id_campeonato = :id
                                        ");
            $sql->bindParam(':id', $id);   
            $sql->execute();

            return $sql;
        }
        
        protected static function agregarEquipo_campeonatoModelo($datos){
            $sql = mainModel::conectar()->prepare("
                                    INSERT INTO equipo_campeonato (`equipo_id_equipo`, `campeonato_id_campeonato`, `fecha_eliminacion`, `descripcion`)
                                    VALUES (:equipo, :campeonato, NULL, NULL);
                                        ");
            $sql->bindParam(':equipo', $datos['eq']);   
            $sql->bindParam(':campeonato', $datos['cp']);   
            $sql->execute();

            return $sql;
        }
        
        protected static function obtenerEquipos_campeonatoModelo($id){
            $sql = mainModel::conectar()->prepare("
                                            SELECT *,e.nombre AS equipo, CONCAT(j.nombre,' ', j.apellido) AS capitan,
                                                CASE e.liga
                                                    WHEN '0'
                                                            THEN 'Novato'
                                                    WHEN '1'
                                                        THEN 'Intermedio'
                                                    WHEN '2'
                                                        THEN 'Avanzado'
                                                    END AS liga_nombre
                                            FROM equipo_campeonato AS ec
                                            INNER JOIN equipo AS e
                                                ON  ec.equipo_id_equipo = e.id_equipo
                                            INNER JOIN jugador as j
                                                ON e.creado_por = j.id_jugador
                                            WHERE ec.campeonato_id_campeonato = :camp
                                        ");
            $sql->bindParam(':camp', $id);   
  
            $sql->execute();

            return $sql;
        }

        protected static function obtener_campeonatoXidModelo($id){
            $sql = mainModel::conectar()->prepare("
                                        SELECT 
                                                c.id_campeonato, c.nombre, c.inscripcion, 
                                                c.fecha_apertura, c.fecha_final, c.descripcion, 
                                                cd.id_c_deportivo As id_cd,
                                                cd.nombre AS cd_nombre, cd.direccion, cd.ciudad, 
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
                                        WHERE c.id_campeonato = :id

                                            ");
            $sql->bindParam(':id', $id);

            $sql->execute();
            return $sql->fetch();
        }
    }