CREATE DATABASE login-system;
USE login-system;
CREATE TABLE users (
	id int AUTO_INCREMENT NOT NULL UNIQUE,
	username varchar(64) NOT NULL UNIQUE,
	password varchar(255) NOT NULL,
	isPassHashed boolean NOT NULL DEFAULT false,
	email varchar(255) NULL UNIQUE,
	isAdmin boolean NOT NULL DEFAULT false,
	PRIMARY KEY (id)
);
CREATE TABLE savedSessions (
	id int NOT NULL UNIQUE,
	userId int NOT NULL,
	passHash varchar(255) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (userId) REFERENCES users(id)
);
