<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reserva
 *CREATE TABLE IF NOT EXISTS `mydb`.`reserva` (
  `id_reserva` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `reserva_para` INT(6) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `estado` INT(6) NOT NULL,
  `jugador_id_jugador` INT NOT NULL,
  `partido_id_partido` INT NOT NULL,
  PRIMARY KEY (`id_reserva`, `jugador_id_jugador`, `partido_id_partido`))
ENGINE = InnoDB;
 * @author carlospc
 */
class reserva {
    
    private $id_reserva;
    private $fecha;
    private $reserva_para;
    private $descripcion;
    private $estado;
    private $jugador_id_jugador;
    private $partido_id_partido;
    
    function __construct($id_reserva, $fecha, $reserva_para, $descripcion, $estado, $jugador_id_jugador, $partido_id_partido) {
        $this->id_reserva = $id_reserva;
        $this->fecha = $fecha;
        $this->reserva_para = $reserva_para;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->jugador_id_jugador = $jugador_id_jugador;
        $this->partido_id_partido = $partido_id_partido;
    }
    
    function getId_reserva() {
        return $this->id_reserva;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getReserva_para() {
        return $this->reserva_para;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getJugador_id_jugador() {
        return $this->jugador_id_jugador;
    }

    function getPartido_id_partido() {
        return $this->partido_id_partido;
    }

    function setId_reserva($id_reserva) {
        $this->id_reserva = $id_reserva;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setReserva_para($reserva_para) {
        $this->reserva_para = $reserva_para;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setJugador_id_jugador($jugador_id_jugador) {
        $this->jugador_id_jugador = $jugador_id_jugador;
    }

    function setPartido_id_partido($partido_id_partido) {
        $this->partido_id_partido = $partido_id_partido;
    }


    
}
