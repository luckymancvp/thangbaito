SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `amazon` ;
CREATE SCHEMA IF NOT EXISTS `amazon` DEFAULT CHARACTER SET utf8 ;
USE `amazon` ;

-- -----------------------------------------------------
-- Table `amazon`.`setting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `amazon`.`setting` ;

CREATE  TABLE IF NOT EXISTS `amazon`.`setting` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `access_key` VARCHAR(255) NOT NULL ,
  `secret_access_key` VARCHAR(255) NOT NULL ,
  `api_version` VARCHAR(255) NOT NULL ,
  `associate_id` VARCHAR(255) NOT NULL ,
  `japan_url` VARCHAR(255) NOT NULL ,
  `usa_url` VARCHAR(255) NOT NULL ,
  `wanted_property` VARCHAR(2555) NOT NULL ,
  `updated_time` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `user_id` (`access_key` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `amazon`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `amazon`.`user` ;

CREATE  TABLE IF NOT EXISTS `amazon`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(25) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username` (`username` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `amazon`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `amazon`.`product` ;

CREATE  TABLE IF NOT EXISTS `amazon`.`product` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `asin` VARCHAR(45) NULL ,
  `data` VARCHAR(25555) NOT NULL DEFAULT '[]' ,
  `updated_time` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `asin_UNIQUE` (`asin` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `amazon`.`setting`
-- -----------------------------------------------------
START TRANSACTION;
USE `amazon`;
INSERT INTO `amazon`.`setting` (`id`, `access_key`, `secret_access_key`, `api_version`, `associate_id`, `japan_url`, `usa_url`, `wanted_property`, `updated_time`) VALUES (NULL, 'AKIAILR6LUUNEKDY2THA', 'yQRPspu5OE+Z19HA86sNp4eRhnyfQlUv2aQ3AAPy', '2011-08-11', 'funkypapa2', 'ecs.amazonaws.jp', 'ecs.amazonaws.com', '[\"StandardPrice\", \"ItemWidth\"]', '2012-12-12 03:03:03');

COMMIT;

-- -----------------------------------------------------
-- Data for table `amazon`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `amazon`;
INSERT INTO `amazon`.`user` (`id`, `username`, `password`) VALUES (1, 'luckymancvp', 'bba19fea927b71d74e753f2487e107fd');
INSERT INTO `amazon`.`user` (`id`, `username`, `password`) VALUES (2, 'thang', 'bb34bdb533b492a62429dd0541d70c6f');

COMMIT;

-- -----------------------------------------------------
-- Data for table `amazon`.`product`
-- -----------------------------------------------------
START TRANSACTION;
USE `amazon`;
INSERT INTO `amazon`.`product` (`id`, `asin`, `data`, `updated_time`) VALUES (NULL, 'B004WNIT3G', '[]', '2013-03-03 12:12:12');

COMMIT;
