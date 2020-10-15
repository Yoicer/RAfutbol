<?php
    if($peticionAjax){
        require_once "../modelo/campeonatoModelo.php";
    }else{
       require_once "./modelo/campeonatoModelo.php";
    }

    class campeonatoControlador extends campeonatoModelo{

        public function obtener_campeonatosControlador(){

            $campeonatos = campeonatoModelo::obtener_campeonatosModelo();

            return $campeonatos;
        }

        public function agregar_campeonatoControlador(){
            
            $nombre = mainModel::limpiar_cadena($_POST['nombre']);
            $id_cd = mainModel::limpiar_cadena($_POST['id_cDeportivo']);
            $inscripcion = mainModel::limpiar_cadena($_POST['inscripcion']);
            $apertura = mainModel::limpiar_cadena($_POST['apertura']);
            $final = mainModel::limpiar_cadena($_POST['final']); 
            $descripcion = mainModel::limpiar_cadena($_POST['descripcion']);


            $datosCampeonato['nombre'] = $nombre;
            $datosCampeonato['id_cd'] = $id_cd;
            $datosCampeonato['inscripcion'] = $inscripcion;
            $datosCampeonato['apertura'] = $apertura;
            $datosCampeonato['final'] = $final;
            $datosCampeonato['descripcion'] = $descripcion;

            if(campeonatoModelo::agregar_campeonatoModelo($datosCampeonato)){
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "Equipo creado";
                $alerta['Texto'] = "El equipo se ha creado correctamente";
                $alerta['Tipo'] = "success";
                
            }
        
        return mainModel::sweet_alert($alerta);
                  
 

        }
    }