<?php
    if($peticionAjax){
        require_once "../nucleo/mainModel.php";
    }else{
        require_once "./nucleo/mainModel.php";
    }


    class loginModelo extends mainModel{

        protected static function iniciar_sesion_modelo($datos){
            $sql = mainModel::conectar()->prepare(" SELECT * FROM `cuenta`
                                                        WHERE clave = :clave AND nombre = :usuario
                                                ");
            $sql->bindParam(':usuario', $datos['usuario']);
            $sql->bindParam(':clave', $datos['clave']);

            $sql->execute();

            return $sql;
        }

        protected static function cerrar_sesion_modelo($datos){
                session_unset();
                session_destroy();
                $respuesta = "True";
            
            return $respuesta;
        }
    }