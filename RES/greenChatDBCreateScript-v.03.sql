-- MySQL Script generated by MySQL Workbench
-- Čet 28 Maj 2015 13:52:37
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema greenChat
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema greenChat
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `greenChat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `greenChat` ;

-- -----------------------------------------------------
-- Table `greenChat`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greenChat`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `firstName` VARCHAR(64) NOT NULL,
  `lastName` VARCHAR(64) NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `birthday` DATE NOT NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greenChat`.`token`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greenChat`.`token` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `validTo` DATETIME NOT NULL,
  `value` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greenChat`.`room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greenChat`.`room` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `status` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(128) NULL,
  `userCount` INT NULL,
  `userMax` INT NULL,
  `creatorId` INT NOT NULL,
  PRIMARY KEY (`id`, `name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greenChat`.`userRole`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greenChat`.`userRole` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `roleId` INT NOT NULL,
  `dateAssigned` DATE NOT NULL,
  `roomId` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greenChat`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greenChat`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(5) NOT NULL,
  `permissions` NVARCHAR(255) NOT NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greenChat`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greenChat`.`log` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `dateCreated` DATETIME NOT NULL,
  `data` TEXT NULL,
  `idOrigin` INT NULL,
  `idInteract` INT NULL,
  PRIMARY KEY (`id`, `dateCreated`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greenChat`.`permission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greenChat`.`permission` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `permission` VARCHAR(45) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `greenChat`.`rolePermission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `greenChat`.`rolePermission` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dateAssigned` DATETIME NOT NULL,
  `roleId` INT NOT NULL,
  `permissionId` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
