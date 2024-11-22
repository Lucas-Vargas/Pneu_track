
CREATE DATABASE PneuTrackDB;
USE PneuTrackDB;



CREATE TABLE `User`(
    `userId` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `isAdmin` BOOLEAN NOT NULL
);
-- -----------------------------------------------------------
CREATE TABLE `Truck`(
    `plate` VARCHAR(7) NOT NULL,
    `model` VARCHAR(255) NOT NULL,
    `driver` VARCHAR(255) NOT NULL,
    `axels` TINYINT NOT NULL,
    `weight` INT NULL,
    PRIMARY KEY(`plate`)
);
-- -----------------------------------------------------------
CREATE TABLE `Tire`(
    `tireId` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `km` BIGINT NOT NULL,
    `Recap` TINYINT NOT NULL,
    `truckFk` VARCHAR(7) NOT NULL,
    FOREIGN KEY (truckFk) REFERENCES Truck(plate)
);
-- -----------------------------------------------------------
CREATE TABLE `RecapDate`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Date` DATE NOT NULL,
    `tireFk` BIGINT NOT NULL,
    FOREIGN KEY (tireFk) REFERENCES Tire(tireId)
);
-- -----------------------------------------------------------

ALTER TABLE
    `RecapDate` ADD CONSTRAINT `recapdate_tirefk_foreign` FOREIGN KEY(`tireFk`) REFERENCES `Tire`(`tireId`);
ALTER TABLE
    `Tire` ADD CONSTRAINT `tire_truckfk_foreign` FOREIGN KEY(`truckFk`) REFERENCES `Truck`(`plate`);