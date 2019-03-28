CREATE DATABASE parkslot;

USE parkslot;

Create table parkPlace (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  type varchar(10) NOT NULL DEFAULT 'normal',
  number VARCHAR(10) NOT NULL, 
  occupied BOOL DEFAULT FALSE
) ENGINE InnoDB;