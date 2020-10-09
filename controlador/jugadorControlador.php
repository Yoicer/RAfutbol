<?php
    if($peticionAjax){
        require_once "../modelo/jugadorModelo.php";
    }else{
        "./modelo/jugadorModelo.php";
    }

    class jugadorControlador extends jugadorModelo{

        public function agregar_jugadorControlador(){
            $cedula = mainModel::limpiar_cadena($_POST['cedula']);
            $nombre = mainModel::limpiar_cadena($_POST['nombre']);
            $apellido = mainModel::limpiar_cadena($_POST['apellido']);
            $telefono = mainModel::limpiar_cadena($_POST['telefono']);
            $posicion = mainModel::limpiar_cadena($_POST['posicion']);
            $ciudad = mainModel::limpiar_cadena($_POST['ciudad']); 
            $usuario = mainModel::limpiar_cadena($_POST['usuario']);
            $clave1 = mainModel::limpiar_cadena($_POST['clave1']);
            $clave2 = mainModel::limpiar_cadena($_POST['clave2']);
            
            if($clave1 != $clave2){
                echo'<script type="text/javascript">
                        alert("Las contraseñas ingresadas no coinciden, vuelva a interarlo");
                        window.location.href="'.SERVERURL.'registroJugador";
                    </script>';
            }else{
                $consulta1 = mainModel::ejecutar_consulta_simple("
                    SELECT cedula FROM `jugador` WHERE `cedula` = $cedula");

                    if($consulta1->rowCount() >= 1){
                        echo'<script type="text/javascript">
                            alert("La cedula ingresada ya se encuentra registrada en el sistema");
                            window.location.href="'.SERVERURL.'registroJugador";
                         </script>';
                    }else{

                        $consulta2 = mainModel::ejecutar_consulta_simple("
                        SELECT nombre FROM `cuenta` WHERE `nombre` = '$usuario'");
                        
                        if($consulta2->rowCount() >= 1){
                            echo'<script type="text/javascript">
                                alert("El usuario ingresado ya se encuentra registrado en el sistema");
                                window.location.href="'.SERVERURL.'registroJugador";
                            </script>';
                        }else{
                            $clave = mainModel::encriptar($clave1);
                            $datosCuenta['usuario'] = $usuario;
                            $datosCuenta['clave'] = $clave;
                            $datosCuenta['rol'] = "jugador";
                            
                            $idCuenta = mainModel::agregar_cuenta($datosCuenta);
                            
                           
                            if($idCuenta->rowCount() >= 1){
                                echo'<script type="text/javascript">
                                alert("Se a registrado el jugado exitosamente.");
                                window.location.href="'.SERVERURL.'home";
                            </script>';
                                $datosJugador['nombre'] = $nombre; 
                                $datosJugador['apellido'] = $apellido; 
                                $datosJugador['cedula'] = $cedula;  
                                $datosJugador['celular'] = $telefono; 
                                $datosJugador['posicion'] = $posicion; 
                                $datosJugador['ciudad'] = $ciudad; 
                                $datosJugador['id_cuenta'] = $idCuenta['id_cuenta'];
                                
                                echo'<script type="text/javascript">
                                        alert("Se a registrado el jugado exitosamente.");
                                        window.location.href="'.SERVERURL.'home";
                                    </script>';

                                $guardarJugador = jugadorModelo::agregar_jugadorModelo($datosJugador);

                                if($guardarJugador->rowCount() >= 1){
                                    echo'<script type="text/javascript">
                                        alert("Se a registrado el jugado exitosamente.");
                                        window.location.href="'.SERVERURL.'home";
                                    </script>';
                                }else{
                                    mainModel::eliminar_cuenta($idCuenta);
                                    
                                }

                            }else{
                               
                            }
                        }
                    }
            }

        }
    }