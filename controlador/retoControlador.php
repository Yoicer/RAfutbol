<?php
    if($peticionAjax){
        require_once "../modelo/retoModelo.php";
    }else{
       require_once "./modelo/retoModelo.php";
    }

    class retoControlador extends retoModelo{

        public function agregar_retoControlador(){
            
        }
    }