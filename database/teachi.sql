SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `teachi` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `teachi` ;

-- -----------------------------------------------------
-- Table `teachi`.`Account`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachi`.`Account` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(100) NOT NULL ,
  `salt` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teachi`.`Author`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachi`.`Author` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Account` INT NULL ,
  `familyName` VARCHAR(100) NOT NULL ,
  `givenName` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Author_Account1` (`Account` ASC) ,
  CONSTRAINT `fk_Author_Account1`
    FOREIGN KEY (`Account` )
    REFERENCES `teachi`.`Account` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teachi`.`Book`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachi`.`Book` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Author` INT NOT NULL ,
  `title` VARCHAR(100) NOT NULL ,
  `link` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `link_UNIQUE` (`link` ASC) ,
  INDEX `fk_Book_Author1` (`Author` ASC) ,
  CONSTRAINT `fk_Book_Author1`
    FOREIGN KEY (`Author` )
    REFERENCES `teachi`.`Author` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teachi`.`Chapter`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachi`.`Chapter` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Book` INT NOT NULL ,
  `number` INT NOT NULL DEFAULT 1 ,
  `title` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_chapter_book` (`Book` ASC) ,
  CONSTRAINT `fk_chapter_book`
    FOREIGN KEY (`Book` )
    REFERENCES `teachi`.`Book` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teachi`.`Presentation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachi`.`Presentation` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Book` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Presentation_Book1` (`Book` ASC) ,
  CONSTRAINT `fk_Presentation_Book1`
    FOREIGN KEY (`Book` )
    REFERENCES `teachi`.`Book` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teachi`.`Content`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachi`.`Content` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Chapter` INT NOT NULL ,
  `number` INT NOT NULL DEFAULT 1 ,
  `content` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Content_Chapter1` (`Chapter` ASC) ,
  CONSTRAINT `fk_Paragraph_Page1`
    FOREIGN KEY (`Chapter` )
    REFERENCES `teachi`.`Chapter` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teachi`.`Slide`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachi`.`Slide` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Presentation` INT NOT NULL ,
  `number` INT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Slide_Presentation1` (`Presentation` ASC) ,
  CONSTRAINT `fk_Slide_Presentation1`
    FOREIGN KEY (`Presentation` )
    REFERENCES `teachi`.`Presentation` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teachi`.`Bullet`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachi`.`Bullet` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Slide` INT NOT NULL ,
  `Content` INT NULL ,
  `number` INT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Bullet_Slide1` (`Slide` ASC) ,
  INDEX `fk_Bullet_Content1` (`Content` ASC) ,
  CONSTRAINT `fk_Bullet_Slide1`
    FOREIGN KEY (`Slide` )
    REFERENCES `teachi`.`Slide` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bullet_Content1`
    FOREIGN KEY (`Content` )
    REFERENCES `teachi`.`Content` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
