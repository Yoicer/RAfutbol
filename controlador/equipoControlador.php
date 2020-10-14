<?php
    if($peticionAjax){
        require_once "../modelo/equipoModelo.php";
    }else{
       require_once "./modelo/equipoModelo.php";
    }


    class equipoControlador extends equipoModelo{

        public function obtener_equiposControlador(){

            $equipos = equipoModelo::obtener_equiposModelo();

            return $equipos;
        }

        public function eliminar_equipoControlador(){
            
            $id_equipo = $_POST['id_eliminar'];
            if( equipoModelo::eliminar_equipoModelo($id_equipo)){
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "Equipo eliminado";
                $alerta['Texto'] = "Se ha eliminado correctamente el equipo";
                $alerta['Tipo'] = "error";
                echo mainModel::sweet_alert($alerta);
            }
            
        }

    }