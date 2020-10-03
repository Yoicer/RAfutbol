<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apuesta
 *CREATE TABLE IF NOT EXISTS `mydb`.`apuesta` (
  `id_apuesta` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT(18) NOT NULL,
  `Descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_apuesta`))
ENGINE = InnoDB;
 * @author carlospc
 */
class apuesta {
    
    private $id_apuesta;
    private $cantidad;
    private $Descripcion;
    
    function __construct($id_apuesta, $cantidad, $Descripcion) {
        $this->id_apuesta = $id_apuesta;
        $this->cantidad = $cantidad;
        $this->Descripcion = $Descripcion;
    }
    
    function getId_apuesta() {
        return $this->id_apuesta;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function setId_apuesta($id_apuesta) {
        $this->id_apuesta = $id_apuesta;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }


}
