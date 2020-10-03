<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reto
 *CREATE TABLE IF NOT EXISTS `mydb`.`reto` (
  `id_reto` INT NOT NULL AUTO_INCREMENT,
  `tipo` INT(5) NOT NULL DEFAULT 0,
  `estado` INT(5) NOT NULL DEFAULT 0,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `reserva_id_reserva` INT NOT NULL,
  `apuesta_id_apuesta` INT NOT NULL,
  PRIMARY KEY (`id_reto`, `reserva_id_reserva`, `apuesta_id_apuesta`))
ENGINE = InnoDB;
 * @author carlospc
 */
class reto {
    
    private $id_reto;
    private $tipo;
    private $estado;
    private $fecha;
    private $descripcion;
    private $reserva_id_reserva;
    private $apuesta_id_apuesta;
    
    function __construct($id_reto, $tipo, $estado, $fecha, $descripcion, $reserva_id_reserva, $apuesta_id_apuesta) {
        $this->id_reto = $id_reto;
        $this->tipo = $tipo;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->reserva_id_reserva = $reserva_id_reserva;
        $this->apuesta_id_apuesta = $apuesta_id_apuesta;
    }

    function getId_reto() {
        return $this->id_reto;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getReserva_id_reserva() {
        return $this->reserva_id_reserva;
    }

    function getApuesta_id_apuesta() {
        return $this->apuesta_id_apuesta;
    }

    function setId_reto($id_reto) {
        $this->id_reto = $id_reto;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setReserva_id_reserva($reserva_id_reserva) {
        $this->reserva_id_reserva = $reserva_id_reserva;
    }

    function setApuesta_id_apuesta($apuesta_id_apuesta) {
        $this->apuesta_id_apuesta = $apuesta_id_apuesta;
    }


}
