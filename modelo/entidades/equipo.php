<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Equipo
 *CREATE TABLE IF NOT EXISTS `mydb`.`equipo` (
  `id_equipo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` INT(5) NOT NULL DEFAULT 1,
  `liga` INT(5) NOT NULL DEFAULT 0,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_equipo`))
ENGINE = InnoDB;
 * @author carlospc
 */
class Equipo {
    private $id_equipo;
    private $nombre;
    private $estado;
    private $liga;
    private $descripcion;
    
    function __construct($id_equipo, $nombre, $estado, $liga, $descripcion) {
        $this->id_equipo = $id_equipo;
        $this->nombre = $nombre;
        $this->estado = $estado;
        $this->liga = $liga;
        $this->descripcion = $descripcion;
    }

    function getId_equipo() {
        return $this->id_equipo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function getLiga() {
        return $this->liga;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_equipo($id_equipo) {
        $this->id_equipo = $id_equipo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setLiga($liga) {
        $this->liga = $liga;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function insertar($equipo) {
      
      $conexion_activa = conectar();
     
       /*private $id_equipo;
    private $nombre;
    private $estado;
    private $liga;
    private $descripcion;*/
      
      $id_equipo = $equipo->getId_equipo();
      $nombre = $equipo->getNombre();
      $estado = $equipo->getEstado();
      $liga = $equipo->getLiga();
      $descripcion = $equipo->getDescripcion();
      
      $query_sql = "INSERT INTO `equipo` (`id_equipo`, `nombre`, `estado`,"
              . " `liga`, `descripcion`) VALUES ('$id_equipo', '$nombre', "
              . "'$estado', '$liga','$descripcion');";
      
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
      $query_sql = "SELECT * FROM 'equipo'";
      
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
  
  public function actualizar($equipo) {
      
      $conexion_activa = conectar();
     
      $id_equipo = $equipo->getId_equipo();
      $nombre = $equipo->getNombre();
      $estado = $equipo->getEstado();
      $liga = $equipo->getLiga();
      $descripcion = $equipo->getDescripcion();
      
      $query_sql = "UPDATE `equipo` SET `id_equipo` = '$id_equipo', `nombre` = '$nombre',"
              . " `estado` = '$estado', `liga` = '$liga', `descripcion` = '$descripcion'"
              . " WHERE `equipo`.`id_equipo` = $id_equipo;";
      
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
       
       $query_sql = "DELETE FROM `equipo` WHERE `equipo`.`id_equipo` = '$id' ";
       
       $resultado_consulta->execute();
       return $resultado_consulta;
      
  }
    
    
}
