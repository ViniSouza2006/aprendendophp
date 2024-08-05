CREATE DATABASE samueldb;
Use samueldb;
 
CREATE TABLE `users`(
    `user_id` INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR(30) NOT NULL,
    `lastname` VARCHAR(30) NOT NULL,
    `address` VARCHAR(150) NOT NULL,
    `contact` VARCHAR(20) NOT NULL  
);