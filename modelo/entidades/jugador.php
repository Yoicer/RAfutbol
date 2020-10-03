<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jugador
 *CREATE TABLE IF NOT EXISTS `mydb`.`jugador` (
  `id_jugador` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `celular` INT(11) NOT NULL,
  `nivel` INT(2) NOT NULL DEFAULT 0,
  `cedula` INT(16) NOT NULL,
  `posicion` VARCHAR(45) NULL,
  `cuenta_id_cuenta` INT NOT NULL,
  `equipo_id_equipo` INT NOT NULL,
  PRIMARY KEY (`id_jugador`, `cuenta_id_cuenta`, `equipo_id_equipo`))
ENGINE = InnoDB;
 * @author carlospc
 */
class jugador {
    
    private $id_jugador;
    private $nombre;
    private $apellido;
    private $celular;
    private $nivel;
    private $cedula;
    private $posicion;
    private $cuenta_id_cuenta;
    private $equipo_id_equipo;
    
    function __construct($id_jugador, $nombre, $apellido, $celular, $nivel, $cedula, $posicion, $cuenta_id_cuenta, $equipo_id_equipo) {
        $this->id_jugador = $id_jugador;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->celular = $celular;
        $this->nivel = $nivel;
        $this->cedula = $cedula;
        $this->posicion = $posicion;
        $this->cuenta_id_cuenta = $cuenta_id_cuenta;
        $this->equipo_id_equipo = $equipo_id_equipo;
    }

    function getId_jugador() {
        return $this->id_jugador;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCelular() {
        return $this->celular;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getPosicion() {
        return $this->posicion;
    }

    function getCuenta_id_cuenta() {
        return $this->cuenta_id_cuenta;
    }

    function getEquipo_id_equipo() {
        return $this->equipo_id_equipo;
    }

    function setId_jugador($id_jugador) {
        $this->id_jugador = $id_jugador;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setPosicion($posicion) {
        $this->posicion = $posicion;
    }

    function setCuenta_id_cuenta($cuenta_id_cuenta) {
        $this->cuenta_id_cuenta = $cuenta_id_cuenta;
    }

    function setEquipo_id_equipo($equipo_id_equipo) {
        $this->equipo_id_equipo = $equipo_id_equipo;
    }


    
}
