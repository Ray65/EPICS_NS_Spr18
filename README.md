# epicsns
EPICs Volunteer Login Program
Credit to: https://www.youtube.com/watch?v=Pz5CbLqdGwM

Don't forget to change db.php and location.php settings.

Below is the SQL commands to use when creating the database.

CREATE DATABASE accounts;

//Creates the main user table
CREATE TABLE `users` 
(
	`id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`admin` BIT NOT NULL,
	`password` CHAR(60),
	`login_time` DATETIME,
	`hours` SMALLINT UNSIGNED,
	`minutes` TINYINT UNSIGNED,
	`logged_in` BIT,

    	PRIMARY KEY (`id`) 
);

//Creates and admin account with the password of 123
INSERT INTO `users` 
(
	`id`, 
	`first_name`, 
	`last_name`, 
	`email`, 
	`admin`, 
	`password`, 
	`login_time`, 
	`hours`, 
	`minutes`, 
	`logged_in` 
) 
VALUES 
(
	'1',
	'Admin',  
	'Account', 
	'admin@gmail.com', 
	b'1', 
	'$2y$10$mZBsfBl6Kksh38roEXa.P.uo2dJwDQuqF0d03Zw8GC66riExtGE7O', 
	NULL, 
	NULL, 
	NULL, 
	b'0'
);

//Creates the login table for the admin
CREATE TABLE `1` (`1` DATETIME);