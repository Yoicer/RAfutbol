<?php
    if($peticionAjax)
    {
        require_once "../nucleo/mainModel.php";
    }else
    {
        "./nucleo/mainModel.php";
    }

    class c_deportivoModelo extends mainModel
    {
        protected static function obtener_cDeportivosModelo(){
            $sql = mainModel::conectar()->prepare("
                                             SELECT * FROM c_deportivo
                                                ");
            $sql->execute();

            return $sql;
        }
        
        protected static function obtenercanchasModelo($id){
            $sql = mainModel::conectar()->prepare("
                                             SELECT * 
                                             FROM `cancha` 
                                             WHERE `c_deportivo_id` = :id
                                                ");
            $sql->bindParam(":id", $id);
            $sql->execute();

            return $sql;
        }

        protected static function obtenerXid_c_deportivoModelo($id){
            $sql = mainModel::conectar()->prepare("
                                                     SELECT * 
                                                     FROM c_deportivo 
                                                     WHERE id_c_deportivo =:id
                                                ");
            $sql->bindParam(":id", $id);

            $sql->execute();

            return $sql->fetch();
        }
        
        protected static function Obtener_cdXidcuentaModelo($id){
            $sql = mainModel::conectar()->prepare("
                                                     SELECT * 
                                                     FROM c_deportivo 
                                                     WHERE cuenta_id_cuenta =:id
                                                ");
            $sql->bindParam(":id", $id);

            $sql->execute();

            return $sql->fetch();
        }
    }