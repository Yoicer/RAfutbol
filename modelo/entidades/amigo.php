<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aamido
 *CREATE TABLE IF NOT EXISTS `mydb`.`amigo` (
  `id_amigo` INT NOT NULL AUTO_INCREMENT,
  `agregado_el` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `jugador_id_jugador` INT NOT NULL,
  PRIMARY KEY (`id_amigo`, `jugador_id_jugador`))
 * @author carlospc
 */
class amigo {
    
    private $id_amigo;
    private $agregado_el;
    private $descripcion;
    private $jugador_id_jugador;
    
    function __construct($id_amigo, $agregado_el, $descripcion, $jugador_id_jugador) {
        $this->id_amigo = $id_amigo;
        $this->agregado_el = $agregado_el;
        $this->descripcion = $descripcion;
        $this->jugador_id_jugador = $jugador_id_jugador;
    }

    function getId_amigo() {
        return $this->id_amigo;
    }

    function getAgregado_el() {
        return $this->agregado_el;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getJugador_id_jugador() {
        return $this->jugador_id_jugador;
    }

    function setId_amigo($id_amigo) {
        $this->id_amigo = $id_amigo;
    }

    function setAgregado_el($agregado_el) {
        $this->agregado_el = $agregado_el;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setJugador_id_jugador($jugador_id_jugador) {
        $this->jugador_id_jugador = $jugador_id_jugador;
    }


}
