<?php
    if($peticionAjax){
        require_once "../modelo/loginModelo.php";
    }else{
        require_once "./modelo/loginModelo.php";
    }


    class loginControlador extends loginModelo{
        
        public function iniciar_sesion_controlador(){
            
            $usuario = mainModel::limpiar_cadena($_POST['usuario']);
            $clave = mainModel::limpiar_cadena($_POST['clave']);

            #$clave = mainModel::encriptar($clave);
            
            $datos['usuario'] = $usuario;
            $datos['clave'] = $clave;

           
            $datosCuenta=loginModelo::iniciar_sesion_modelo($datos);

            if($datosCuenta->rowCount() >= 1){
                echo "hola";
                 $row = $datosCuenta->fetch();
                session_start(['name'=> 'RAFutbol']);
                $_SESSION['usuario_RAF'] = $row['nombre'];
                $_SESSION['tipo_RAF'] = $row['rol'];
                $_SESSION['idCuenta_RAF'] = $row['id_cuenta'];
               
                if($row['rol'] == "Administrador"){
                    $url = SERVERURL."home/";
                }elseif($row['rol'] == "Jugador"){
                    $url = SERVERURL."home/";
                }else{
                    $url = SERVERURL."home/";
                }

                return '<script type="text/javascript">
                                        window.location.href="'.$url.'";
                                    </script>';
            }else{
                $alerta['Alerta'] = "simple";
                $alerta['Titulo'] = "Ocurrio un error inesperado";
                $alerta['Texto'] = "EL nombre de usuario o contraseña son incorrectos";
                $alerta['Tipo'] = "error";
            }
            return mainModel::sweet_alert($alerta);
        }

        public function forzar_cierre_sesion_controlador(){
            session_destroy();
            return header("Location: ".SERVERURL);
        }
    }