SET sql_notes = 0; 

CREATE DATABASE IF NOT EXISTS kfsquared;

USE kfsquared;

CREATE TABLE IF NOT EXISTS `passphrases` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `passphrase` VARCHAR(10) NOT NULL,
    `has_logged_in` BOOLEAN NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `rsvps` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `inviteeid` INT NOT NULL,
    `passphraseid` INT NOT NULL,
    `is_coming` BOOLEAN NOT NULL,
    `plus_one_coming` BOOLEAN,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `invitees` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `passphraseid` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `has_plus_one` BOOLEAN NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `admins` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `passcode` VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
