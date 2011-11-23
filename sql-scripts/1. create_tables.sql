create table leiding (
	leiding_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	chiro char not null,
	voornaam varchar(100) not null,
	naam varchar(100) not null,
	mail varchar(100) not null,
	password char(32),
	afbeelding mediumblob not null
) engine=innodb;

create table rol(
	rol_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	titel varchar(30) not null,
	omschrijving varchar(500) not null
 ) engine=innodb;

create table groep(
	groep_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	chiro char not null,
	naam varchar(200) not null,
	kleur char(6) not null,
	rangnummer int not null
 ) engine=innodb;

create table programma (
	programma_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	groep_id int not null,
	datum date not null,
	programma varchar (300) not null
 ) engine=innodb;

create table leiding_rol(
	leiding_rol_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	rol_id int not null,
	leiding_id int not null
 ) engine=innodb;

create table leiding_groep(
	leiding_groep_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	leiding_id int not null,
	groep_id int not null,
	jaar char(9) not null
 ) engine=innodb;

CREATE TABLE kalender_item (
	 kalender_item_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	 groep char not null,
	 datum date not null,
	 activiteit varchar(100) not null
 ) engine=innodb;
 
CREATE TABLE nieuws_item(
	nieuws_item_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	datum date not null,
	tekst varchar (150) not null
)engine=innodb;

-- http://www.phpriot.com/articles/storing-images-in-mysql