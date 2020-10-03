<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of arbitro
 *CREATE TABLE IF NOT EXISTS `mydb`.`arbitro` (
  `id_arbitro` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `celular` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_arbitro`))
ENGINE = InnoDB;
 * @author carlospc
 */
class arbitro {
    
    private $id_arbitro;
    private $nombre;
    private $celular;
    private $descripcion;
    
    function __construct($id_arbitro, $nombre, $celular, $descripcion) {
        $this->id_arbitro = $id_arbitro;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->descripcion = $descripcion;
    }
    
    function getId_arbitro() {
        return $this->id_arbitro;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCelular() {
        return $this->celular;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_arbitro($id_arbitro) {
        $this->id_arbitro = $id_arbitro;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
