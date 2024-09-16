SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE GCKEEPER;
USE GCKEEPER;

CREATE TABLE empresa (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	cnpj VARCHAR(50),
	celular VARCHAR(32),
	cep VARCHAR(9),
	uf VARCHAR(20),
	cidade VARCHAR(100),
	bairro VARCHAR(100),
	rua VARCHAR(60),
	numero_de_residencia INT(11),
	email VARCHAR(70),
	tipo VARCHAR(12),
	senha VARCHAR(15)
);
CREATE TABLE clinica (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	cnpj VARCHAR(50),
	celular VARCHAR(32),
	cep VARCHAR(9),
	uf VARCHAR(20),
	cidade VARCHAR(100),
	bairro VARCHAR(100),
	rua VARCHAR(60),
	numero_de_residencia INT(11),
	email VARCHAR(70),
	tipo VARCHAR(12),
	senha VARCHAR(15),
	id_da_empresa INT,
	FOREIGN KEY (id_da_empresa) REFERENCES empresa (id)
);

CREATE TABLE vinculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
	id_da_clinica INT,
	id_da_empresa INT,
	FOREIGN KEY (id_da_clinica) REFERENCES clinica (id),
	FOREIGN KEY (id_da_empresa) REFERENCES empresa (id)
);

CREATE TABLE colaborador (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	celular VARCHAR(32),
	email VARCHAR(70),
	senha VARCHAR(15),
	tipo VARCHAR(12),
	id_da_empresa INT,
	FOREIGN KEY (id_da_empresa) REFERENCES empresa (id)
);

CREATE TABLE exame (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100),
	valor DECIMAL(10,2),
	id_da_clinica INT,
	FOREIGN KEY (id_da_clinica) REFERENCES clinica (id)
);

CREATE TABLE profissional (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	sexo VARCHAR(9),
	data_de_nascimento DATE,
	cpf VARCHAR(11),
	celular VARCHAR(32),
	cep VARCHAR(9),
	uf VARCHAR(2),
	bairro VARCHAR(20),
	cidade VARCHAR(20),
	rua VARCHAR(60),
	numero_de_residencia INT(11),
	email VARCHAR(70),
	id_da_clinica INT,
	FOREIGN KEY (id_da_clinica) REFERENCES clinica (id)
);

CREATE TABLE paciente (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	sexo VARCHAR(9),
	data_de_nascimento DATE,
	cpf VARCHAR(11),
	celular VARCHAR(32),
	cep VARCHAR(10),
	uf VARCHAR(20),
	cidade VARCHAR(100),
	bairro VARCHAR(100),
	rua VARCHAR(60),
	numero_de_residencia INT(11),
	email VARCHAR(70),
	tipo_exame VARCHAR(80),
	passou_na_clinica DATE,
	id_da_clinica INT,
	id_da_empresa INT,
	FOREIGN KEY (id_da_empresa) REFERENCES empresa (id),
	FOREIGN KEY (id_da_clinica) REFERENCES clinica (id)
);

	CREATE TABLE paciente_exame (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	valor DECIMAL(10,2),
	id_do_exame INT,
	id_do_paciente INT,
	id_da_clinica INT,
	FOREIGN KEY (id_do_exame) REFERENCES exame (id),
	FOREIGN KEY (id_do_paciente) REFERENCES paciente (id),
	FOREIGN KEY (id_da_clinica) REFERENCES clinica (id)
);

CREATE TABLE agendamento_de_consulta (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_paciente VARCHAR(50),
	cpf VARCHAR(11),
	celular VARCHAR(32),
	email VARCHAR(70),
	data_da_consulta DATE,
	hora TIME,
	tipo_exame VARCHAR(80),
	id_do_colaborador INT,
	id_do_vinculos INT,
	FOREIGN KEY (id_do_vinculos) REFERENCES vinculos (id),
	FOREIGN KEY (id_do_colaborador) REFERENCES colaborador (id)
);


