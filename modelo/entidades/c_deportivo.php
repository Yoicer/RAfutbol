<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CentroDeportivo
 *CREATE TABLE IF NOT EXISTS `mydb`.`c_deportivo` (
  `id_c_deportivo` INT NOT NULL AUTO_INCREMENT,
  `nit` INT(18) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `calificacion` INT(5) NULL DEFAULT 0,
  `direccion` VARCHAR(45) NOT NULL,
  `capacidad` INT(6) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `cuenta_id_cuenta` INT NOT NULL,
  PRIMARY KEY (`id_c_deportivo`, `cuenta_id_cuenta`))
ENGINE = InnoDB;


 * @author carlospc
 */
class c_deportivo {
    
    private $id_centro_deportivo;
    private $nit;
    private $nombre;
    private $calificacion;
    private $direccion;
    private $capacidad;
    private $decripcion;
    private $cuenta_id_cuenta;
    
    function __construct($id_centro_deportivo, $nit, $nombre, $calificacion, $direccion, $capacidad, $decripcion, $cuenta_id_cuenta) {
        $this->id_centro_deportivo = $id_centro_deportivo;
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->calificacion = $calificacion;
        $this->direccion = $direccion;
        $this->capacidad = $capacidad;
        $this->decripcion = $decripcion;
        $this->cuenta_id_cuenta = $cuenta_id_cuenta;
    }
    
    function getId_centro_deportivo() {
        return $this->id_centro_deportivo;
    }

    function getNit() {
        return $this->nit;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCalificacion() {
        return $this->calificacion;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCapacidad() {
        return $this->capacidad;
    }

    function getDecripcion() {
        return $this->decripcion;
    }

    function getCuenta_id_cuenta() {
        return $this->cuenta_id_cuenta;
    }

    function setId_centro_deportivo($id_centro_deportivo) {
        $this->id_centro_deportivo = $id_centro_deportivo;
    }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }

    function setDecripcion($decripcion) {
        $this->decripcion = $decripcion;
    }

    function setCuenta_id_cuenta($cuenta_id_cuenta) {
        $this->cuenta_id_cuenta = $cuenta_id_cuenta;
    }



}
