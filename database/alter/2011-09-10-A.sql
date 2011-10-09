SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

ALTER TABLE `teachi`.`Book` DROP FOREIGN KEY `fk_Book_Author1` ;

ALTER TABLE `teachi`.`Chapter` DROP FOREIGN KEY `fk_chapter_book` ;

ALTER TABLE `teachi`.`Presentation` DROP FOREIGN KEY `fk_Presentation_Book1` ;

ALTER TABLE `teachi`.`Content` DROP FOREIGN KEY `fk_Paragraph_Page1` ;

ALTER TABLE `teachi`.`Slide` DROP FOREIGN KEY `fk_Slide_Presentation1` ;

ALTER TABLE `teachi`.`Bullet` DROP FOREIGN KEY `fk_Bullet_Slide1` , DROP FOREIGN KEY `fk_Bullet_Content1` ;

ALTER TABLE `teachi`.`Author` DROP FOREIGN KEY `fk_Author_Account1` ;

ALTER TABLE `teachi`.`Book` DROP COLUMN `Author` , ADD COLUMN `Author` INT(11) NOT NULL  AFTER `id` , 
  ADD CONSTRAINT `fk_Book_Author1`
  FOREIGN KEY (`Author` )
  REFERENCES `teachi`.`Author` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, DROP INDEX `fk_Book_Author1` 
, ADD INDEX `fk_Book_Author1` (`Author` ASC) ;

ALTER TABLE `teachi`.`Chapter` DROP COLUMN `Book` , ADD COLUMN `Book` INT(11) NOT NULL  AFTER `id` , 
  ADD CONSTRAINT `fk_chapter_book`
  FOREIGN KEY (`Book` )
  REFERENCES `teachi`.`Book` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_chapter_book` (`Book` ASC) 
, DROP INDEX `fk_chapter_book` ;

ALTER TABLE `teachi`.`Presentation` DROP COLUMN `Book` , ADD COLUMN `Book` INT(11) NOT NULL  AFTER `id` , 
  ADD CONSTRAINT `fk_Presentation_Book1`
  FOREIGN KEY (`Book` )
  REFERENCES `teachi`.`Book` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, DROP INDEX `fk_Presentation_Book1` 
, ADD INDEX `fk_Presentation_Book1` (`Book` ASC) ;

ALTER TABLE `teachi`.`Content` DROP COLUMN `order` , DROP COLUMN `Chapter` , ADD COLUMN `Chapter` INT(11) NOT NULL  AFTER `id` , ADD COLUMN `number` INT(11) NOT NULL DEFAULT 1  AFTER `Chapter` , 
  ADD CONSTRAINT `fk_Paragraph_Page1`
  FOREIGN KEY (`Chapter` )
  REFERENCES `teachi`.`Chapter` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_Content_Chapter1` (`Chapter` ASC) 
, DROP INDEX `fk_Content_Chapter1` ;

ALTER TABLE `teachi`.`Slide` DROP COLUMN `Presentation` , ADD COLUMN `Presentation` INT(11) NOT NULL  AFTER `id` , 
  ADD CONSTRAINT `fk_Slide_Presentation1`
  FOREIGN KEY (`Presentation` )
  REFERENCES `teachi`.`Presentation` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, DROP INDEX `fk_Slide_Presentation1` 
, ADD INDEX `fk_Slide_Presentation1` (`Presentation` ASC) ;

ALTER TABLE `teachi`.`Bullet` DROP COLUMN `order` , DROP COLUMN `Content` , DROP COLUMN `Slide` , ADD COLUMN `Slide` INT(11) NOT NULL  AFTER `id` , ADD COLUMN `Content` INT(11) NULL DEFAULT NULL  AFTER `Slide` , ADD COLUMN `number` INT(11) NOT NULL DEFAULT 1  AFTER `Content` , 
  ADD CONSTRAINT `fk_Bullet_Slide1`
  FOREIGN KEY (`Slide` )
  REFERENCES `teachi`.`Slide` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION, 
  ADD CONSTRAINT `fk_Bullet_Content1`
  FOREIGN KEY (`Content` )
  REFERENCES `teachi`.`Content` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, DROP INDEX `fk_Bullet_Slide1` 
, ADD INDEX `fk_Bullet_Slide1` (`Slide` ASC) 
, DROP INDEX `fk_Bullet_Content1` 
, ADD INDEX `fk_Bullet_Content1` (`Content` ASC) ;

ALTER TABLE `teachi`.`Author` DROP COLUMN `Account` , ADD COLUMN `Account` INT(11) NULL DEFAULT NULL  AFTER `id` , 
  ADD CONSTRAINT `fk_Author_Account1`
  FOREIGN KEY (`Account` )
  REFERENCES `teachi`.`Account` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, DROP INDEX `fk_Author_Account1` 
, ADD INDEX `fk_Author_Account1` (`Account` ASC) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
