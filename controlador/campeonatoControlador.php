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
        
        public function obtener_campeonatoXidControlador(){
            $id = $_POST['id_unirse'];
            $campeonato = campeonatoModelo::obtener_campeonatoXidModelo($id);

            return $campeonato;
        }

        public function eliminar_campeonatoControlador(){
            $id = $_POST['id_eliminar'];
            if(campeonatoModelo::eliminar_campeonatoModelo($id)){
                $alerta['Alerta'] = "simple";
                    $alerta['Titulo'] = "Campeonato eliminado";
                    $alerta['Texto'] = "El Campeonato se ha eliminado correctamente";
                    $alerta['Tipo'] = "error";
            }
            echo mainModel::sweet_alert($alerta);  
        }

        public function agregar_campeonatoControlador(){
            
            $nombre = mainModel::limpiar_cadena($_POST['nombre']);
            $id_cd = mainModel::limpiar_cadena($_POST['id_cd']);
            $nivel = mainModel::limpiar_cadena($_POST['nivel']);
            $inscripcion = mainModel::limpiar_cadena($_POST['inscripcion']);
            $apertura = mainModel::limpiar_cadena($_POST['apertura']);
            $final = mainModel::limpiar_cadena($_POST['final']); 
            $descripcion = mainModel::limpiar_cadena($_POST['descripcion']);

            $datosCampeonato['nombre'] = $nombre;
            $datosCampeonato['id_cd'] = $id_cd;
            $datosCampeonato['inscripcion'] = $inscripcion;
            $datosCampeonato['apertura'] = $apertura;
            $datosCampeonato['final'] = $final;
            $datosCampeonato['nivel'] = $nivel;
            $datosCampeonato['descripcion'] = $descripcion;

            $hoy = date("Y-m-d");
            if($hoy < $apertura AND $apertura < $final){
                if(campeonatoModelo::agregar_campeonatoModelo($datosCampeonato)){
                    $alerta['Alerta'] = "simple";
                    $alerta['Titulo'] = "Campeonato creado";
                    $alerta['Texto'] = "El Campeonato se ha creado correctamente";
                    $alerta['Tipo'] = "success";
                }
            }else{
                $alerta['Alerta'] = "simple";
                    $alerta['Titulo'] = "Fechas Erroneas";
                    $alerta['Texto'] = "Las fechas de apertura o final presentan inconvenintes, asegurese de que sean fechas posteriores al dia de hoy";
                    $alerta['Tipo'] = "error";
            }
        return mainModel::sweet_alert($alerta);
        }
    }