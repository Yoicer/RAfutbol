<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dministrador
 *CREATE TABLE IF NOT EXISTS `mydb`.`dministrador` (
  `id_administrador` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` INT(6) NOT NULL DEFAULT 0,
  `cuenta_id_cuenta` INT NOT NULL,
  PRIMARY KEY (`id_administrador`, `cuenta_id_cuenta`))
 * @author carlospc
 */
class dministrador {
    
    private $id_administrador;
    private $nombre;
    private $estado;
    private $cuenta_id_cuenta;
    
    function __construct($id_administrador, $nombre, $estado, $cuenta_id_cuenta) {
        $this->id_administrador = $id_administrador;
        $this->nombre = $nombre;
        $this->estado = $estado;
        $this->cuenta_id_cuenta = $cuenta_id_cuenta;
    }

    function getId_administrador() {
        return $this->id_administrador;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCuenta_id_cuenta() {
        return $this->cuenta_id_cuenta;
    }

    function setId_administrador($id_administrador) {
        $this->id_administrador = $id_administrador;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCuenta_id_cuenta($cuenta_id_cuenta) {
        $this->cuenta_id_cuenta = $cuenta_id_cuenta;
    }


}
