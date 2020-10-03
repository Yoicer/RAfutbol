<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bitacora_reservas
 *CREATE TABLE IF NOT EXISTS `mydb`.`bitacora_reservas` (
  `id_bitacora_sesion` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `reserva_id_reserva` INT NOT NULL,
  PRIMARY KEY (`id_bitacora_sesion`, `reserva_id_reserva`))
ENGINE = InnoDB;
 * @author carlospc
 */
class bitacora_reservas {
    
    private $id_bitacora_sesion;
    private $fecha;
    private $descripcion;
    private $reserva_id_reserva;
    
    function __construct($id_bitacora_sesion, $fecha, $descripcion, $reserva_id_reserva) {
        $this->id_bitacora_sesion = $id_bitacora_sesion;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->reserva_id_reserva = $reserva_id_reserva;
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

    function getReserva_id_reserva() {
        return $this->reserva_id_reserva;
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

    function setReserva_id_reserva($reserva_id_reserva) {
        $this->reserva_id_reserva = $reserva_id_reserva;
    }


}
