CREATE DATABASE IF NOT EXISTS sistema_crud
DEFAULT CHARACTER SET UTF8
DEFAULT COLLATE UTF8_GENERAL_CI;

USE sistema_crud;

CREATE TABLE IF NOT EXISTS sc_cliente(
	id int not null auto_increment,
	nome varchar(255) not null, 
	email varchar(255) not null, 
	idade int(2) not null, 
	status int,
	primary key(id)
) auto_increment= 1;

INSERT INTO SC_CLIENTE (nome, email, idade, status) VALUES ("Raissa", "rqt@email.com", "20", "1");
INSERT INTO SC_CLIENTE (nome, email, idade, status) VALUES ("Luana", "luana@email.com", "18", "1");