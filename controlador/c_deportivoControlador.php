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

        public function obtenerXid_c_deportivoControlador($id){

            $c_deportivo = c_deportivoModelo::obtenerXid_c_deportivoModelo($id);
            return $c_deportivo;
        }
        public function obtenercanchasControlador($id){

            $canchas = c_deportivoModelo::obtenercanchasModelo($id);
            return $canchas;
        }

        public function Obtener_cdXidcuentaControlador($id){
          
            $id_cuenta = $id;
            $cd = c_deportivoModelo::Obtener_cdXidcuentaModelo($id_cuenta);
            
            return $cd;
        }
    }
