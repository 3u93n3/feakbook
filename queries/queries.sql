CREATE TABLE IF NOT EXISTS `users` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`userName` varchar(50) NOT NULL,
	`password` varchar(100) NOT NULL,
	`img_url` varchar(50) NOT NULL,
	`regData` timestamp DEFAULT CURRENT_TIMESTAMP ,   
	PRIMARY KEY (`id`),
	UNIQUE KEY (userName)
);

CREATE TABLE IF NOT EXISTS `posts` (
	`post_id` int(10) NOT NULL AUTO_INCREMENT,
	`author` varchar(50) NOT NULL,
	`subject` varchar(50) NOT NULL,
	`post` text NOT NULL,
	`public` int(2) NOT NULL DEFAULT 1,
	`post_data` timestamp DEFAULT CURRENT_TIMESTAMP ,   
	PRIMARY KEY (`post_id`)
); 

CREATE TABLE IF NOT EXISTS `friends` (
	`friend_id` int(11) NOT NULL AUTO_INCREMENT,
	`use_one` varchar(50) NOT NULL,
	`use_two` varchar(50) NOT NULL,
	`status` int(10) NOT NULL,   
	PRIMARY KEY (`friend_id`)
); 

CREATE TABLE IF NOT EXISTS `administration` (
	`admin_id` int(11) NOT NULL AUTO_INCREMENT,
	`admin` varchar(50) NOT NULL,
	`admin_pass` varchar(50) NOT NULL,
	PRIMARY KEY (`admin_id`)
); 

CREATE TABLE IF NOT EXISTS `codes` (
	`code_id` int(11) NOT NULL AUTO_INCREMENT,
	`code` varchar(50) NOT NULL,	
	PRIMARY KEY (`code_id`)
); 
