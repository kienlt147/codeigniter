DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`username` varchar(150) NOT NULL,
	`password` varchar(150) NOT NULL,
	`fullname` varchar(150) NOT NULL,
	`current_sign_in_at` datetime NOT NULL,
	`last_sign_in_at` datetime NOT NULL,
	`current_sign_in_ip` varchar(150) NOT NULL,
	`last_sign_in_ip` varchar(150) NOT NULL,
	`created_at` datetime NOT NULL,
	`permision` tinyint(1) DEFAULT 0,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(250) NOT NULL,
	`position` tinyint(2) DEFAULT 0,
	`created_at` datetime NOT NULL,
	`status` tinyint(1) DEFAULT 1,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `lists`;

CREATE TABLE `lists` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`category_id` int(11) NOT NULL,
	`name` varchar(250) NOT NULL,
	`position` tinyint(2) DEFAULT 0,
	`created_at` datetime NOT NULL,
	`status` tinyint(1) DEFAULT 1,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`list_id` int(11) NOT NULL,
	`name` varchar(150) NOT NULL,
	`price` varchar(150) NOT NULL,
	`sale` int(11) DEFAULT NULL,
	`image` varchar(250) NOT NULL,
	`description` text NOT NULL,
	`set_new` int DEFAULT 0,
	`status` tinyint(1) DEFAULT 1,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(150) NOT NULL,
	`image` varchar(250) NOT NULL,
	`description` text NOT NULL,
	`link` varchar(250) NOT NULL,
	`position` varchar(50) NOT NULL,
	`status` tinyint(1) DEFAULT 1,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`description` text NOT NULL,
	`created_at` datetime NOT NULL,
	`status` tinyint(1) NOT NULL,
	PRIMARY KEY (`id`)
);

