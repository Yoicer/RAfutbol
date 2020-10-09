<?php
    if($peticionAjax){
        require_once "../nucleo/mainModel.php";
    }else{
        "./nucleo/mainModel.php";
    }

    class jugadorModelo extends mainModel{

        protected static function agregar_jugadorModelo($datos){
                $sql = mainModel::conectar()->prepare("
                                            INSERT INTO `jugador` (
                                                nombre, 
                                                apellido,
                                                celular,
                                                nivel, 
                                                cedula,
                                                ciudad, 
                                                posicion, 
                                                cuenta_id_cuenta, 
                                                equipo_id_equipo  )
                                            VALUES (
                                                :nombre,
                                                :apellido,
                                                :celular,
                                                '0',
                                                :cedula,
                                                :ciudad,
                                                :posicion,
                                                :id_cuenta,
                                                '0'  );
                                                    ");
                $sql->bindParam(':nombre',$datos['nombre']);
                $sql->bindParam(':apellido',$datos['apellido']);
                $sql->bindParam(':celular',$datos['celular']);
                $sql->bindParam(':cedula',$datos['cedula']);
                $sql->bindParam(':ciudad',$datos['ciudad']);
                $sql->bindParam(':posicion',$datos['posicion']);
                $sql->bindParam(':id_cuenta',$datos['id_cuenta']);
                $sql->execute();
                return $sql['id_jugador'];
        }
    }