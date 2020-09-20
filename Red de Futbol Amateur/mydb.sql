-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`usuario` ;

CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `llave` INT(18) NOT NULL,
  `fecha_registro` DATE NOT NULL,
  `Estado` INT(5) NOT NULL DEFAULT '1',
  `rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`equipo` ;

CREATE TABLE IF NOT EXISTS `mydb`.`equipo` (
  `id_equipo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` INT(5) NOT NULL DEFAULT 1,
  `liga` INT(5) NOT NULL DEFAULT 0,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_equipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`jugador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`jugador` ;

CREATE TABLE IF NOT EXISTS `mydb`.`jugador` (
  `id_jugador` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `celular` INT(11) NOT NULL,
  `nivel` INT(2) NOT NULL DEFAULT 0,
  `cedula` INT(16) NOT NULL,
  `usuario_id_usuario` INT NOT NULL,
  `equipo_id_equipo` INT NOT NULL,
  PRIMARY KEY (`id_jugador`, `usuario_id_usuario`, `equipo_id_equipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`campeonato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`campeonato` ;

CREATE TABLE IF NOT EXISTS `mydb`.`campeonato` (
  `id_campeonato` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `inscripcion` INT(6) NOT NULL,
  `fecha_apertura` DATE NOT NULL,
  `fecha_final` DATE NOT NULL,
  `estado` INT(6) NOT NULL DEFAULT 0,
  `tipo` INT(6) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `ganador` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_campeonato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`c_deportivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`c_deportivo` ;

CREATE TABLE IF NOT EXISTS `mydb`.`c_deportivo` (
  `id_c_deportivo` INT NOT NULL AUTO_INCREMENT,
  `nit` INT(18) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `calificacion` INT(5) NULL DEFAULT 0,
  `direccion` VARCHAR(45) NOT NULL,
  `capacidad` INT(6) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `usuario_id_usuario` INT NOT NULL,
  `campeonato_id_campeonato` INT NOT NULL,
  PRIMARY KEY (`id_c_deportivo`, `usuario_id_usuario`, `campeonato_id_campeonato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`reserva`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`reserva` ;

CREATE TABLE IF NOT EXISTS `mydb`.`reserva` (
  `id_reserva` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `reserva_para` INT(6) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `estado` INT(6) NOT NULL,
  PRIMARY KEY (`id_reserva`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`apuesta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`apuesta` ;

CREATE TABLE IF NOT EXISTS `mydb`.`apuesta` (
  `id_apuesta` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT(18) NOT NULL,
  `Descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_apuesta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`reto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`reto` ;

CREATE TABLE IF NOT EXISTS `mydb`.`reto` (
  `id_reto` INT NOT NULL AUTO_INCREMENT,
  `tipo` INT(5) NOT NULL DEFAULT 0,
  `estado` INT(5) NOT NULL DEFAULT 0,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `reserva_id_reserva` INT NOT NULL,
  `apuesta_id_apuesta` INT NOT NULL,
  PRIMARY KEY (`id_reto`, `reserva_id_reserva`, `apuesta_id_apuesta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bitacora_sesion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bitacora_sesion` ;

CREATE TABLE IF NOT EXISTS `mydb`.`bitacora_sesion` (
  `id_bitacora_sesion` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_bitacora_sesion`, `usuario_id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`amigo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`amigo` ;

CREATE TABLE IF NOT EXISTS `mydb`.`amigo` (
  `id_amigo` INT NOT NULL AUTO_INCREMENT,
  `agregado_el` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `jugador_id_jugador` INT NOT NULL,
  `jugador_usuario_id_usuario` INT NOT NULL,
  `jugador_equipo_id_equipo` INT NOT NULL,
  PRIMARY KEY (`id_amigo`, `jugador_id_jugador`, `jugador_usuario_id_usuario`, `jugador_equipo_id_equipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`arbitro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`arbitro` ;

CREATE TABLE IF NOT EXISTS `mydb`.`arbitro` (
  `id_arbitro` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `celular` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_arbitro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cancha`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`cancha` ;

CREATE TABLE IF NOT EXISTS `mydb`.`cancha` (
  `id_cancha` INT NOT NULL AUTO_INCREMENT,
  `Estado` INT(1) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `superficie` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(45) NULL,
  `c_deportivo_id_c_deportivo` INT NOT NULL,
  `c_deportivo_usuario_id_usuario` INT NOT NULL,
  `c_deportivo_campeonato_id_campeonato` INT NOT NULL,
  PRIMARY KEY (`id_cancha`, `c_deportivo_id_c_deportivo`, `c_deportivo_usuario_id_usuario`, `c_deportivo_campeonato_id_campeonato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`partido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`partido` ;

CREATE TABLE IF NOT EXISTS `mydb`.`partido` (
  `id_partido` INT NOT NULL AUTO_INCREMENT,
  `id_ganador` INT(18) NOT NULL,
  `id_perdedor` INT(18) NOT NULL,
  `goles_ganador` INT(6) NOT NULL,
  `goles_perdedor` VARCHAR(6) NOT NULL,
  `faltas_ganador` INT(6) NOT NULL,
  `faltas_perdedor` INT(6) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `campeonato_id_campeonato` INT NOT NULL,
  `reserva_id_reserva` INT NOT NULL,
  `arbitro_id_arbitro` INT NOT NULL,
  `cancha_id_cancha` INT NOT NULL,
  `cancha_c_deportivo_id_c_deportivo` INT NOT NULL,
  `cancha_c_deportivo_usuario_id_usuario` INT NOT NULL,
  `cancha_c_deportivo_campeonato_id_campeonato` INT NOT NULL,
  PRIMARY KEY (`id_partido`, `campeonato_id_campeonato`, `reserva_id_reserva`, `arbitro_id_arbitro`, `cancha_id_cancha`, `cancha_c_deportivo_id_c_deportivo`, `cancha_c_deportivo_usuario_id_usuario`, `cancha_c_deportivo_campeonato_id_campeonato`),
  INDEX `id_ganador` (`id_ganador` ASC, `id_perdedor` ASC) INVISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bitacora_partidos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bitacora_partidos` ;

CREATE TABLE IF NOT EXISTS `mydb`.`bitacora_partidos` (
  `id_bitacora_sesion` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `partido_id_partido` INT NOT NULL,
  `partido_campeonato_id_campeonato` INT NOT NULL,
  `partido_reserva_id_reserva` INT NOT NULL,
  `partido_arbitro_id_arbitro` INT NOT NULL,
  `partido_cancha_id_cancha` INT NOT NULL,
  `partido_cancha_c_deportivo_id_c_deportivo` INT NOT NULL,
  `partido_cancha_c_deportivo_usuario_id_usuario` INT NOT NULL,
  `partido_cancha_c_deportivo_campeonato_id_campeonato` INT NOT NULL,
  PRIMARY KEY (`id_bitacora_sesion`, `partido_id_partido`, `partido_campeonato_id_campeonato`, `partido_reserva_id_reserva`, `partido_arbitro_id_arbitro`, `partido_cancha_id_cancha`, `partido_cancha_c_deportivo_id_c_deportivo`, `partido_cancha_c_deportivo_usuario_id_usuario`, `partido_cancha_c_deportivo_campeonato_id_campeonato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bitacora_reservas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bitacora_reservas` ;

CREATE TABLE IF NOT EXISTS `mydb`.`bitacora_reservas` (
  `id_bitacora_sesion` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `reserva_id_reserva` INT NOT NULL,
  PRIMARY KEY (`id_bitacora_sesion`, `reserva_id_reserva`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dministrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`dministrador` ;

CREATE TABLE IF NOT EXISTS `mydb`.`dministrador` (
  `id_administrador` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` INT(6) NOT NULL DEFAULT 0,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_administrador`, `usuario_id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipo_campeonato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`equipo_campeonato` ;

CREATE TABLE IF NOT EXISTS `mydb`.`equipo_campeonato` (
  `equipo_id_equipo` INT NOT NULL,
  `campeonato_id_campeonato` INT NOT NULL,
  `fecha_eliminacion` DATE NULL,
  `descripcion` VARCHAR(45) NULL,
  `equipo_campeonatocol` VARCHAR(45) NULL,
  PRIMARY KEY (`equipo_id_equipo`, `campeonato_id_campeonato`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
