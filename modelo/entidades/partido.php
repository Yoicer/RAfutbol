<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partido
 *CREATE TABLE IF NOT EXISTS `mydb`.`partido` (
  `id_partido` INT NOT NULL AUTO_INCREMENT,
  `id_ganador` INT(18) NOT NULL,
  `id_perdedor` INT(18) NOT NULL,
  `goles_ganador` INT(6) NOT NULL,
  `goles_perdedor` VARCHAR(6) NOT NULL,
  `faltas_ganador` INT(6) NOT NULL,
  `faltas_perdedor` INT(6) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `campeonato_id_campeonato` INT NOT NULL,
  `arbitro_id_arbitro` INT NOT NULL,
  `cancha_id_cancha` INT NOT NULL,
  PRIMARY KEY (`id_partido`, `campeonato_id_campeonato`, `arbitro_id_arbitro`, `cancha_id_cancha`))
ENGINE = InnoDB;
 * @author carlospc
 */
class partido {
    
    private $id_partido;
    private $id_ganador;
    private $id_perdedor;
    private $goles_ganador;
    private $goles_perdedor;
    private $faltas_ganador;
    private $faltas_perdedor;
    private $descripcion;
    private $campeonato_id_campeonato;
    private $arbitro_id_arbitro;
    private $cancha_id_cancha;
    
    function __construct($id_partido, $id_ganador, $id_perdedor, $goles_ganador, $goles_perdedor, $faltas_ganador, $faltas_perdedor, $descripcion, $campeonato_id_campeonato, $arbitro_id_arbitro, $cancha_id_cancha) {
        $this->id_partido = $id_partido;
        $this->id_ganador = $id_ganador;
        $this->id_perdedor = $id_perdedor;
        $this->goles_ganador = $goles_ganador;
        $this->goles_perdedor = $goles_perdedor;
        $this->faltas_ganador = $faltas_ganador;
        $this->faltas_perdedor = $faltas_perdedor;
        $this->descripcion = $descripcion;
        $this->campeonato_id_campeonato = $campeonato_id_campeonato;
        $this->arbitro_id_arbitro = $arbitro_id_arbitro;
        $this->cancha_id_cancha = $cancha_id_cancha;
        
    }

    function getId_partido() {
        return $this->id_partido;
    }

    function getId_ganador() {
        return $this->id_ganador;
    }

    function getId_perdedor() {
        return $this->id_perdedor;
    }

    function getGoles_ganador() {
        return $this->goles_ganador;
    }

    function getGoles_perdedor() {
        return $this->goles_perdedor;
    }

    function getFaltas_ganador() {
        return $this->faltas_ganador;
    }

    function getFaltas_perdedor() {
        return $this->faltas_perdedor;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCampeonato_id_campeonato() {
        return $this->campeonato_id_campeonato;
    }

    function getArbitro_id_arbitro() {
        return $this->arbitro_id_arbitro;
    }

    function getCancha_id_cancha() {
        return $this->cancha_id_cancha;
    }

    function setId_partido($id_partido) {
        $this->id_partido = $id_partido;
    }

    function setId_ganador($id_ganador) {
        $this->id_ganador = $id_ganador;
    }

    function setId_perdedor($id_perdedor) {
        $this->id_perdedor = $id_perdedor;
    }

    function setGoles_ganador($goles_ganador) {
        $this->goles_ganador = $goles_ganador;
    }

    function setGoles_perdedor($goles_perdedor) {
        $this->goles_perdedor = $goles_perdedor;
    }

    function setFaltas_ganador($faltas_ganador) {
        $this->faltas_ganador = $faltas_ganador;
    }

    function setFaltas_perdedor($faltas_perdedor) {
        $this->faltas_perdedor = $faltas_perdedor;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCampeonato_id_campeonato($campeonato_id_campeonato) {
        $this->campeonato_id_campeonato = $campeonato_id_campeonato;
    }

    function setArbitro_id_arbitro($arbitro_id_arbitro) {
        $this->arbitro_id_arbitro = $arbitro_id_arbitro;
    }

    function setCancha_id_cancha($cancha_id_cancha) {
        $this->cancha_id_cancha = $cancha_id_cancha;
    }


}
