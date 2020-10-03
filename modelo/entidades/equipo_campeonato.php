<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equipo_campeonato
 *CREATE TABLE IF NOT EXISTS `mydb`.`equipo_campeonato` (
  `equipo_id_equipo` INT NOT NULL,
  `campeonato_id_campeonato` INT NOT NULL,
  `fecha_eliminacion` DATE NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`equipo_id_equipo`, `campeonato_id_campeonato`))
ENGINE = InnoDB;
 * @author carlospc
 */
class equipo_campeonato {
    
    private $equipo_id_equipo;
    private $campeonato_id_campeeonato;
    private $fecha_eliminacion;
    private $descripcion;
    
    function __construct($equipo_id_equipo, $campeonato_id_campeeonato, $fecha_eliminacion, $descripcion) {
        $this->equipo_id_equipo = $equipo_id_equipo;
        $this->campeonato_id_campeeonato = $campeonato_id_campeeonato;
        $this->fecha_eliminacion = $fecha_eliminacion;
        $this->descripcion = $descripcion;
    }

    function getEquipo_id_equipo() {
        return $this->equipo_id_equipo;
    }

    function getCampeonato_id_campeeonato() {
        return $this->campeonato_id_campeeonato;
    }

    function getFecha_eliminacion() {
        return $this->fecha_eliminacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setEquipo_id_equipo($equipo_id_equipo) {
        $this->equipo_id_equipo = $equipo_id_equipo;
    }

    function setCampeonato_id_campeeonato($campeonato_id_campeeonato) {
        $this->campeonato_id_campeeonato = $campeonato_id_campeeonato;
    }

    function setFecha_eliminacion($fecha_eliminacion) {
        $this->fecha_eliminacion = $fecha_eliminacion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
