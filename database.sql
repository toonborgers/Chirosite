create table leiding (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	chiro char not null,
	naam varchar(100) not null,
	mail varchar(100) not null,
	functies varchar(15),
	afbeelding mediumblob not null
) engine=innodb;

create table functies (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	omschrijving varchar(100) not null	
)engine=innodb;

create table nieuws (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	datum date not null,
	bericht varchar(100) not null	
) engine=innodb;

create table programmas (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	chiro char not null,
	datum date not null,
	programma varchar(100) not null	
) engine=innodb;

create table kalender (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	chiro char not null,
	datum date not null,
	activiteit varchar(100) not null	
) engine=innodb;

create table kamp (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	chiro char not null,
	adres varchar(200) not null,
	tekst varchar(5000) not null	
) engine=innodb;

create table login (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	login varchar(20) not null,
	wachtwoord varchar(32) not null	
) engine=innodb;