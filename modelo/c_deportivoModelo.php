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
    }