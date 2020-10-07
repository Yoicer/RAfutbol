<?php 

   class vistasModelo{

        protected static function obtener_vistas_modelo($vistas){

            $listaBlanca=["login","home","error"];
            
            if (in_array($vistas , $listaBlanca)) {
               if (is_file("./vistas/contenido/".$vistas."-view.php")) {
                  $contenido="./vistas/contenido/".$vistas."-view.php";
               }else{
                  $contenido="login";
               }
            }elseif ($vistas=="login") {
               $contenido="login";
            }elseif ($vistas == "index") {
               $contenido="login";
            }else{
               $contenido="error";
            }
            return $contenido;
        }

   }