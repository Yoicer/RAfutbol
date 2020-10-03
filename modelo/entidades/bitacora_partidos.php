<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bitacora_partidos
 *CREATE TABLE IF NOT EXISTS `mydb`.`bitacora_partidos` (
  `id_bitacora_sesion` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `partido_id_partido` INT NOT NULL,
  PRIMARY KEY (`id_bitacora_sesion`, `partido_id_partido`))
ENGINE = InnoDB;
 * @author carlospc
 */
class bitacora_partidos {
    
    private $id_bitacora_sesion;
    private $fecha;
    private $descripcion;
    private $partido_id_partido;
    
    function __construct($id_bitacora_sesion, $fecha, $descripcion, $partido_id_partido) {
        $this->id_bitacora_sesion = $id_bitacora_sesion;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->partido_id_partido = $partido_id_partido;
    }
    
    function getId_bitacora_sesion() {
        return $this->id_bitacora_sesion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPartido_id_partido() {
        return $this->partido_id_partido;
    }

    function setId_bitacora_sesion($id_bitacora_sesion) {
        $this->id_bitacora_sesion = $id_bitacora_sesion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPartido_id_partido($partido_id_partido) {
        $this->partido_id_partido = $partido_id_partido;
    }



}
