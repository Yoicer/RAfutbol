<?php
    if($peticionAjax)
    {
        require_once "../nucleo/mainModel.php";
    }else
    {
        "./nucleo/mainModel.php";
    }

    class jugadorModelo extends mainModel
    {
        protected static function obtenerCampeonatos(){
            $sql = mainModel::conectar()->prepare("");

            $sql->execute();
        }
    }