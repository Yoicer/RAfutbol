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


}
