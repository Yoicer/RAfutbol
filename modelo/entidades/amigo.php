<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aamido
 *CREATE TABLE IF NOT EXISTS `mydb`.`amigo` (
  `id_amigo` INT NOT NULL AUTO_INCREMENT,
  `agregado_el` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `jugador_id_jugador` INT NOT NULL,
  PRIMARY KEY (`id_amigo`, `jugador_id_jugador`))
 * @author carlospc
 */
class amigo {
    
    private $id_amigo;
    private $agregado_el;
    private $descripcion;
    private $jugador_id_jugador;
    
    function __construct($id_amigo, $agregado_el, $descripcion, $jugador_id_jugador) {
        $this->id_amigo = $id_amigo;
        $this->agregado_el = $agregado_el;
        $this->descripcion = $descripcion;
        $this->jugador_id_jugador = $jugador_id_jugador;
    }

    function getId_amigo() {
        return $this->id_amigo;
    }

    function getAgregado_el() {
        return $this->agregado_el;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getJugador_id_jugador() {
        return $this->jugador_id_jugador;
    }

    function setId_amigo($id_amigo) {
        $this->id_amigo = $id_amigo;
    }

    function setAgregado_el($agregado_el) {
        $this->agregado_el = $agregado_el;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setJugador_id_jugador($jugador_id_jugador) {
        $this->jugador_id_jugador = $jugador_id_jugador;
    }

    public function insertar($amigo) {
      
      $conexion_activa = conectar();
     
      $id_amigo = $amigo->getId_amigo();
      $agregado_el = $amigo->getAgregado_el();
      $descripcion = $amigo->getDescripcion();
      $jugador_id_jugador = $amigo->getJugador_id_jugador();
      
      $query_sql = "INSERT INTO amigo ('id_amigo', 'agregado_el', 'descripcion','
                . ' jugador_id_jugador') VALUES (NULL, $agregado_el, $descripcion,'
                .   $id_jugador);";
      
      $resultado_consulta = $conexion_activa->prepare($query_sql);
      if (!$resultado_consulta = $conexion_activa->prepare($query_sql)){
          print("error al insertar ");
        }
        else
        {
            print("objeto insertado ");
        }
        $resultado_consulta->execute();
        return $resultado_consulta;
  }
  
  public function listar() {
      
      $conexion_activa = conectar();
      $query_sql = "SELECT * FROM 'amigo'";
      
      $resultado_consulta = $conexion_activa->prepare($query_sql);
      if (!$resultado_consulta = $conexion_activa->prepare($query_sql)){
          print("error al consultar ");
        }
        else
        {
            print("objeto consultado ");
        }
        $resultado_consulta->execute();
        
        return $resultado_consulta;
      
      
  }
  
  public function actualizar($amigo) {
      
      $conexion_activa = conectar();
     
      $id_amigo = $amigo->getId_amigo();
      $agregado_el = $amigo->getAgregado_el();
      $descripcion = $amigo->getDescripcion();
      $jugador_id_jugador = $amigo->getJugador_id_jugador();
      
      $query_sql = "UPDATE `amigo` SET `id_amigo` = '$id_amigo', "
              . "`agregado_el` = '$agregado_el', `descripcion` = '$descripcion',"
              . " `jugador_id_jugador` = '$jugador_id_jugador'";
      
      $resultado_consulta = $conexion_activa->prepare($query_sql);
      if (!$resultado_consulta = $conexion_activa->prepare($query_sql)){
          print("error al actualizar ");
        }
        else
        {
            print("objeto actualizado ");
        }
        $resultado_consulta->execute();
        
        
        return $resultado_consulta;
      
  }
  
  public function eliminar($id) {
      
       $conexion_activa = conectar();
       
       $query_sql = "DELETE FROM `amigo` WHERE `amigo`.`id_amigo` = '$id' ";
       
       $resultado_consulta->execute();
       return $resultado_consulta;
      
  }
}
