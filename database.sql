SET sql_notes = 0; 

CREATE DATABASE IF NOT EXISTS kfsquared;

USE kfsquared;

CREATE TABLE IF NOT EXISTS `passphrases` (
    `passphrase_id` INT NOT NULL AUTO_INCREMENT,
    `family_id` INT NOT NULL,
    `passphrase` VARCHAR(10) NOT NULL,
    `has_logged_in` BOOLEAN NOT NULL,
    PRIMARY KEY (passphrase_id)
);

CREATE TABLE IF NOT EXISTS `invites` (
    `person_id` INT NOT NULL AUTO_INCREMENT,
    `family_id` INT NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `web` INT NOT NULL,
    `web_count` INT NOT NULL,
    `phone` INT NOT NULL,
    `phone_count` INT NOT NULL,
    `date_rsvp` DATE,
    `rsvp` INT,
    PRIMARY KEY (person_id)
);
