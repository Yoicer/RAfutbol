<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cuenta
 *CREATE TABLE IF NOT EXISTS `mydb`.`cuenta` (
  `id_cuenta` INT NOT NULL AUTO_INCREMENT,
  `clave` INT(18) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `fecha_registro` DATE NOT NULL,
  `Estado` INT(5) NOT NULL DEFAULT '1',
  `rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cuenta`))
ENGINE = InnoDB;

 * @author carlospc
 */
class cuenta {
    
    private $id_cuenta;
    private $clave;
    private $nombre;
    private $fecha_registro;
    private $Estado;
    private $rol;
    
    function __construct($id_cuenta, $clave, $nombre, $fecha_registro, $Estado, $rol) {
        $this->id_cuenta = $id_cuenta;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->fecha_registro = $fecha_registro;
        $this->Estado = $Estado;
        $this->rol = $rol;
    }

    function getId_cuenta() {
        return $this->id_cuenta;
    }

    function getClave() {
        return $this->clave;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getRol() {
        return $this->rol;
    }

    function setId_cuenta($id_cuenta) {
        $this->id_cuenta = $id_cuenta;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    public function insertar($cuenta) {
      
      $conexion_activa = conectar();
     
       /*private $id_cuenta;
        private $clave;
        private $nombre;
        private $fecha_registro;
        private $Estado;
        private $rol;*/
      
      $id_cuenta = $cuenta->getId_cuenta();
      $clave = $cuenta->getClave();
      $nombre = $cuenta->getNombre();
      $fecha_registro = $cuenta->getFecha_registro();
      $Estado = $cuenta->getEstado();
      $rol = $cuenta->getRol();
      
      $query_sql = "INSERT INTO `cuenta` (`id_cuenta`, `clave`, `nombre`, 
          `fecha_registro`, `Estado`, `rol`) VALUES ('$id_cuenta', '$clave',
              '$nombre','$fecha_registro', '$Estado', '$rol');";
      
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
      $query_sql = "SELECT * FROM 'cuenta'";
      
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
  
  public function actualizar($cuenta) {
      
      $conexion_activa = conectar();
     
      $id_cuenta = $cuenta->getId_cuenta();
      $clave = $cuenta->getClave();
      $nombre = $cuenta->getNombre();
      $fecha_registro = $cuenta->getFecha_registro();
      $Estado = $cuenta->getEstado();
      $rol = $cuenta->getRol();
      
      $query_sql = "UPDATE `cuenta` SET `id_cuenta` = '$id_cuenta',
          `clave` = '$clave', `nombre` = '$nombre', `fecha_registro` = '$fecha_registro',
              `Estado` = '$Estado', `rol` = '$rol' WHERE `cuenta`.`id_cuenta` = $id_cuenta;
";
      
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
       
       $query_sql = "DELETE FROM `cuenta` WHERE `cuenta`.`id_cuenta` = '$id' ";
       
       $resultado_consulta->execute();
       return $resultado_consulta;
      
  }
    
}
