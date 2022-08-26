CREATE DATABASE short;
USE short;

CREATE TABLE `admin`(
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `email` VARCHAR(255),
    `pass` VARCHAR(1000)
);
INSERT INTO `admin`(`email`,`pass`)VALUE('admin@localhost', '123');

CREATE TABLE `links`(
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `short` VARCHAR(255),
    `full` VARCHAR(10000),
    `time` VARCHAR(20),
    `status` INTEGER
);