<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if($peticionAjax){
        require_once "../nucleo/mainModel.php";
    }else{
        "./nucleo/mainModel.php";
    }

    class partidoModelo extends mainModel{

        protected static function listar_partidosModelo(){
            
            $sql = mainModel::conectar()->prepare("SELECT * FROM `partido`");
            
            $sql->execute();

            return $sql;
        }
        
        protected static function agregar_partidoModelo($datos){
                
            $sql = mainModel::conectar()->prepare("");
                
                $sql->bindParam(':nombre',$datos['nombre']);
                               
                
                $sql->execute();
                return $sql;
        }
        
        protected static function obtener_partidoXid($id_partido){
            
            $sql = mainModel::conectar()->prepare("SELECT * FROM `partido`"
                    . "WHERE id_partido = :id_partido");
            
            $sql->bindParam(':id_partido',$id_partido);
            
            $sql->execute();
           
            return $sql->fetchAll();

        }
        
        protected static function actualizar_partidoModelo($datos){
                $sql = mainModel::conectar()->prepare("");
                
                
                $sql->execute();
                
                return $sql;
        }
        
        protected static function eliminar_partidoModelo($id_partido){
            $sql = mainModel::conectar()->prepare("
                                                DELETE FROM `partido`
                                                WHERE ((`id_partido` = :id_partido));
                                                ");
            
            $sql->bindParam(':id_partido', $id_partido);
            
            $sql->execute();

            return $sql;
        }
    }

