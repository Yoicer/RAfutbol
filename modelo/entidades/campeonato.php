<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campeonato
 *CREATE TABLE IF NOT EXISTS `mydb`.`campeonato` (
  `id_campeonato` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `inscripcion` INT(6) NOT NULL,
  `fecha_apertura` DATE NOT NULL,
  `fecha_final` DATE NOT NULL,
  `estado` INT(6) NOT NULL DEFAULT 0,
  `tipo` INT(6) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `ganador` VARCHAR(45) NOT NULL,
  `c_deportivo_id_c_deportivo` INT NOT NULL,
  PRIMARY KEY (`id_campeonato`, `c_deportivo_id_c_deportivo`))
ENGINE = InnoDB;private $;
 * @author carlospc
 */
class campeonato {
    
    private $id_campeonato;
    private $nombre;
    private $inscripcion;
    private $fecha_apertura;
    private $fecha_final;
    private $estado;
    private $tipo;
    private $descripcion;
    private $ganador;
    private $c_deportivo_id_c_deportivo;
    
    function __construct($id_campeonato, $nombre, $inscripcion, $fecha_apertura, $fecha_final, $estado, $tipo, $descripcion, $ganador, $c_deportivo_id_c_deportivo) {
        $this->id_campeonato = $id_campeonato;
        $this->nombre = $nombre;
        $this->inscripcion = $inscripcion;
        $this->fecha_apertura = $fecha_apertura;
        $this->fecha_final = $fecha_final;
        $this->estado = $estado;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->ganador = $ganador;
        $this->c_deportivo_id_c_deportivo = $c_deportivo_id_c_deportivo;
    }

    function getId_campeonato() {
        return $this->id_campeonato;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getInscripcion() {
        return $this->inscripcion;
    }

    function getFecha_apertura() {
        return $this->fecha_apertura;
    }

    function getFecha_final() {
        return $this->fecha_final;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getGanador() {
        return $this->ganador;
    }

    function getC_deportivo_id_c_deportivo() {
        return $this->c_deportivo_id_c_deportivo;
    }

    function setId_campeonato($id_campeonato) {
        $this->id_campeonato = $id_campeonato;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setInscripcion($inscripcion) {
        $this->inscripcion = $inscripcion;
    }

    function setFecha_apertura($fecha_apertura) {
        $this->fecha_apertura = $fecha_apertura;
    }

    function setFecha_final($fecha_final) {
        $this->fecha_final = $fecha_final;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setGanador($ganador) {
        $this->ganador = $ganador;
    }

    function setC_deportivo_id_c_deportivo($c_deportivo_id_c_deportivo) {
        $this->c_deportivo_id_c_deportivo = $c_deportivo_id_c_deportivo;
    }


    
}
