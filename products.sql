CREATE SCHEMA IF NOT EXISTS `pcstoreproject` DEFAULT CHARACTER SET utf8 ;
USE `pcstoreproject` ;

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`category` (
  `categoryID` INT NOT NULL,
  `category_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`categoryID`));
  
CREATE TABLE `products` (
  `productID` INT NOT NULL AUTO_INCREMENT,
  `categoryID` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `price` INT NOT NULL,
  `quantity` INT NOT NULL,
  `manufacturer` VARCHAR(45) NOT NULL,
  `img_src` VARCHAR(255) NOT NULL,
  `model` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`productID`),
  UNIQUE INDEX (`productID`),
  FOREIGN KEY (`categoryID`)
    REFERENCES `pcstoreproject`.`category` (`categoryID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`Sockets` (
  `socketID` INT NOT NULL,
  `socket_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`socketID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`CPUs` (
  `productID` INT NOT NULL,
  `base_clock` FLOAT NOT NULL,
  `boost_clock` VARCHAR(45) NOT NULL,
  `core_count` INT NOT NULL,
  `thread_count` INT NOT NULL,
  `series` VARCHAR(45) NOT NULL,
  `socketID` INT NOT NULL,
  CONSTRAINT `productID`
    FOREIGN KEY (`productID`)
    REFERENCES `pcstoreproject`.`products` (`productID`),
	CONSTRAINT `fk_CPUs_Sockets1`
    FOREIGN KEY (`socketID`)
    REFERENCES `pcstoreproject`.`Sockets` (`socketID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`GPUs` (
  `productID` INT NOT NULL,
  `base_clock` FLOAT NOT NULL,
  `boost_clock` VARCHAR(45) NOT NULL,
  `core_count` INT NOT NULL,
  `series` VARCHAR(45) NOT NULL,
  `vendor` VARCHAR(45) NOT NULL,
  `vram` INT NOT NULL,
  `vram_type` VARCHAR(45) NOT NULL,
  `connector_type` VARCHAR(45) NOT NULL,
    FOREIGN KEY (`productID`)
    REFERENCES `pcstoreproject`.`products` (`productID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`Chipsets` (
  `chipsetID` INT NOT NULL,
  `chipset_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`chipsetID`));


CREATE TABLE IF NOT EXISTS `pcstoreproject`.`Motherboards` (
  `productID` INT NOT NULL,
  `socketID` INT NOT NULL,
  `chipsetID` INT NOT NULL,
  `supported_memory` ENUM('DDR3', 'DDR4', 'DDR5') NOT NULL,
    FOREIGN KEY (`productID`)
    REFERENCES `pcstoreproject`.`products` (`productID`),
    FOREIGN KEY (`socketID`)
    REFERENCES `pcstoreproject`.`Sockets` (`socketID`),
    FOREIGN KEY (`chipsetID`)
    REFERENCES `pcstoreproject`.`Chipsets` (`chipsetID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`RAM` (
  `productID` INT NOT NULL,
  `frequency` FLOAT NOT NULL,
  `latency` INT NOT NULL,
  `type` VARCHAR(45) NOT NULL,
    FOREIGN KEY (`productID`)
    REFERENCES `pcstoreproject`.`products` (`productID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`PowerRatings` (
  `ratingID` INT NOT NULL,
  `rating_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ratingID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`PSUs` (
  `productID` INT NOT NULL,
  `PowerRatings_ratingID` INT NOT NULL,
  `wattage` INT NOT NULL,
  `type` ENUM('Modular', 'Semi-modular', 'Non-modular') NOT NULL,
    FOREIGN KEY (`productID`)
    REFERENCES `pcstoreproject`.`products` (`productID`),
    FOREIGN KEY (`PowerRatings_ratingID`)
    REFERENCES `pcstoreproject`.`PowerRatings` (`ratingID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`Storage` (
  `productID` INT NOT NULL,
  `capacity` VARCHAR(45) NOT NULL,
  `type` ENUM('HDD', 'SSD', 'NVMe SSD') NOT NULL,
  `write_speed` FLOAT NOT NULL,
  `read_speed` FLOAT NOT NULL,
  `dram_cache` INT NOT NULL,
    FOREIGN KEY (`productID`)
    REFERENCES `pcstoreproject`.`products` (`productID`));

CREATE TABLE IF NOT EXISTS `pcstoreproject`.`Cooling` (
  `productID` INT NOT NULL,
  `fan_type` ENUM('CPU Fan', 'Case Fan') NOT NULL,
  `fan_speed` INT NOT NULL,
  `fan_size` INT NOT NULL,
  `air_flow` FLOAT NOT NULL,
  `noise` FLOAT NOT NULL,
    FOREIGN KEY (`productID`)
    REFERENCES `pcstoreproject`.`products` (`productID`));
