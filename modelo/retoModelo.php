<?php
    if($peticionAjax)
    {
        require_once "../nucleo/mainModel.php";
    }else
    {
        "./nucleo/mainModel.php";
    }

    class retoModelo extends mainModel
    {
        protected static function obtener_retosModelo(){
           // $hoy = date("Y-m-d");
            $sql = mainModel::conectar()->prepare("
                                    SELECT *
                                    FROM reto AS r
                                    INNER JOIN jugador AS j
                                    ON j.id_jugador = r.creado_por

                                                ");
          //  $sql->bindParam(':hoy', $hoy);

            $sql->execute();
            return $sql;
        }
        
        protected static function agregar_retoModelo($datos){
            $sql = mainModel::conectar()->prepare("
                                   
                                        ");
        
            $sql->execute();

            return $sql;
        }
       

       
    }