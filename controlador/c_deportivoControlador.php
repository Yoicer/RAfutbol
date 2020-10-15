<?php
    if($peticionAjax){
        require_once "../modelo/c_deportivoModelo.php";
    }else{
       require_once "./modelo/c_deportivoModelo.php";
    }

    class c_deportivoControlador extends c_deportivoModelo{

        public function obtener_cDeportivosControlador(){

            $c_deportivos = c_deportivoModelo::obtener_cDeportivosModelo();

            return $c_deportivos;
        }
    }
