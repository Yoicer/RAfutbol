<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bitacora_sesion
 *REATE TABLE IF NOT EXISTS `mydb`.`bitacora_sesion` (
  `id_bitacora_sesion` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_bitacora_sesion`, `usuario_id_usuario`))
ENGINE = InnoDB;

 * @author carlospc
 */
class bitacora_sesion {
    
    private $id_bitacora_sesion;
    private $fecha;
    private $descripcion;
    private $usuario_id_usuario;
    
    function __construct($id_bitacora_sesion, $fecha, $descripcion, $usuario_id_usuario) {
        $this->id_bitacora_sesion = $id_bitacora_sesion;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->usuario_id_usuario = $usuario_id_usuario;
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

    function getUsuario_id_usuario() {
        return $this->usuario_id_usuario;
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

    function setUsuario_id_usuario($usuario_id_usuario) {
        $this->usuario_id_usuario = $usuario_id_usuario;
    }

}
