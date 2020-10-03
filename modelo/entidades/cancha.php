<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cancha
 *CREATE TABLE IF NOT EXISTS `mydb`.`cancha` (
  `id_cancha` INT NOT NULL AUTO_INCREMENT,
  `Estado` INT(1) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `superficie` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NULL,
  `c_deportivo_id_c_deportivo` INT NOT NULL,
  PRIMARY KEY (`id_cancha`, `c_deportivo_id_c_deportivo`))
ENGINE = InnoDB;
 * @author carlospc
 */
class cancha {
    
    private $id_cancha;
    private $Estado;
    private $nombre;
    private $superficie;
    private $Descripcion;
    private $c_deportivo_id_c_deportivo;
    
    function __construct($id_cancha, $Estado, $nombre, $superficie, $Descripcion, $c_deportivo_id_c_deportivo) {
        $this->id_cancha = $id_cancha;
        $this->Estado = $Estado;
        $this->nombre = $nombre;
        $this->superficie = $superficie;
        $this->Descripcion = $Descripcion;
        $this->c_deportivo_id_c_deportivo = $c_deportivo_id_c_deportivo;
    }

    function getId_cancha() {
        return $this->id_cancha;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getSuperficie() {
        return $this->superficie;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function getC_deportivo_id_c_deportivo() {
        return $this->c_deportivo_id_c_deportivo;
    }

    function setId_cancha($id_cancha) {
        $this->id_cancha = $id_cancha;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setSuperficie($superficie) {
        $this->superficie = $superficie;
    }

    function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    function setC_deportivo_id_c_deportivo($c_deportivo_id_c_deportivo) {
        $this->c_deportivo_id_c_deportivo = $c_deportivo_id_c_deportivo;
    }


}
