-- Script para criação do BD do Esquema Relacional 5
-- Grupo: Filipe Carlos e Matheus Campos

-- se já existe um esquema empresa, delete
DROP SCHEMA EMPRESA;

-- criando esquema
CREATE DATABASE EMPRESA;
USE EMPRESA;

-- criando tabelas
CREATE TABLE PESSOA (
	COD_PESSOA INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	NOME VARCHAR(20) NOT NULL,
	ENDERECO VARCHAR(255) NOT NULL,
	TIPO CHAR(1) NOT NULL,
	ESPECIALIDADE VARCHAR(20),
	TELEFONE INTEGER(8)
);

CREATE TABLE EQUIPE(
	ID_EQUIPE INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	NOME VARCHAR(20) NOT NULL,

	UNIQUE(NOME)
);

CREATE TABLE VEICULO (
	CHASSI VARCHAR(17) NOT NULL PRIMARY KEY,
	MARCA VARCHAR(20) NOT NULL,
	COD_PESSOA INTEGER
);

CREATE TABLE ORDEM_SERVICO (
	NUMERO_OS INTEGER NOT NULL AUTO_INCREMENT,
	DATA_EMISSAO VARCHAR(10) NOT NULL,
	DATA_CONCLUSAO VARCHAR(10),
	CHASSI VARCHAR(17) NOT NULL,
	ID_EQUIPE INTEGER,
    
    PRIMARY KEY(NUMERO_OS,CHASSI),
    FOREIGN KEY (CHASSI) references VEICULO(CHASSI) on update no action on delete cascade
);

CREATE TABLE ITEM (
	COD_ITEM INTEGER NOT NULL PRIMARY KEY,
	DESCRICAO VARCHAR(100),
	NUM_OS INTEGER,
	CHASSI VARCHAR(17),
    FOREIGN KEY(NUM_OS) references ORDEM_SERVICO(NUMERO_OS)
);

CREATE TABLE PECA (
	COD_PECA INTEGER NOT NULL,
	FORNECEDOR VARCHAR(20)
);

CREATE TABLE SERVICO(
	COD_SERVICO INTEGER NOT NULL,
	GARANTIA TINYINT
);

CREATE TABLE DEMANDA (
	COD_ITEM_PECA INTEGER NOT NULL,
	COD_ITEM_SERVICO INTEGER NOT NULL
);

CREATE TABLE PERTENCE (
	ID_EQUIPE INTEGER NOT NULL,
	COD_PESSOA INTEGER NOT NULL
);

-- povoando banco de dados
INSERT INTO PESSOA (COD_PESSOA, NOME, ENDERECO, TIPO, ESPECIALIDADE, TELEFONE) VALUES
(NULL, 'Matheus Campos', 'Avenida Tapajós, 125-C', 'M', 'Motor', NULL),
(NULL, 'Filipe Carlos', 'Rua Mamanguape, 100', 'C', NULL, 12345678),
(NULL, 'Edna Wilma', 'Avenida Recife, 3856', 'C', NULL, 87654321),
(NULL, 'Daniel Campos', 'Avenida Barreto de Menezes, 500', 'M', 'Chassi', NULL),
(NULL, 'Carlos Alberto', 'Rua 15, 182', 'M', 'Pneu', NULL),
(NULL, 'Rafael Martins', 'Rua Jangadeiro, 252, Apt: 308', 'C', NULL, 40028922);

INSERT INTO VEICULO (CHASSI, MARCA, COD_PESSOA) VALUES
('9BWHE21JX24060960', 'VOLKSWAGEN', 1),
('9BKHE220X24060961', 'FIAT', 2),
('9BCHE23LX24060962', 'NISSAN', 3),
('9BAHE24MX24060963', 'AUDI', 4),
('9BDHE25BX24060964', 'BMW', 5),
('9BFHE26GX24060965', 'CITROEN', 6);

INSERT INTO ORDEM_SERVICO (NUMERO_OS, DATA_EMISSAO, DATA_CONCLUSAO, CHASSI, ID_EQUIPE) VALUES
(NULL, STR_TO_DATE('16,8,2017','%d,%m,%Y'), STR_TO_DATE('17,8,2017','%d,%m,%Y'), '9BWHE21JX24060960', 1),
(NULL, STR_TO_DATE('15,8,2017','%d,%m,%Y'), STR_TO_DATE('17,8,2017','%d,%m,%Y'), '9BDHE25BX24060964', 2),
(NULL, STR_TO_DATE('14,8,2017','%d,%m,%Y'), STR_TO_DATE('14,8,2017','%d,%m,%Y'), '9BFHE26GX24060965', 3),
(NULL, STR_TO_DATE('12,8,2017','%d,%m,%Y'), NULL, '9BAHE24MX24060963', 1),
(NULL, STR_TO_DATE('11,8,2017','%d,%m,%Y'), STR_TO_DATE('15,8,2017','%d,%m,%Y'), '9BCHE23LX24060962', 1),
(NULL, STR_TO_DATE('13,8,2017','%d,%m,%Y'), STR_TO_DATE('14,8,2017','%d,%m,%Y'), '9BKHE220X24060961', 2);

INSERT INTO ITEM (COD_ITEM, DESCRICAO, NUM_OS, CHASSI) VALUES
(1, 'Radiador', 3, '9BWHE21JX24060960'),
(2, 'Alinhamento', 2, '9BFHE26GX24060965'),
(3, 'Bateria', 3, '9BWHE21JX24060960'),
(4, 'Balanceamento', 4, '9BDHE25BX24060964'),
(5, 'Ajuste dos freios', 3, '9BWHE21JX24060960'),
(6, 'Cárter', 6, '9BKHE220X24060961'),
(7, 'Troca de óleo', 6, '9BKHE220X24060961'),
(8, 'Pneu', 2, '9BFHE26GX24060965'),
(9, 'Motor', 3, '9BWHE21JX24060960'),
(10, 'Pneu', 4, '9BDHE25BX24060964'),
(11, 'Manutenção', 3, '9BWHE21JX24060960');

INSERT INTO PECA (COD_PECA, FORNECEDOR) VALUES
(1, 'AUDI'),
(3, 'HELIAR'),
(6, 'FIAT'),
(8, 'MICHELLIN'),
(9, 'VOLKSWAGEN'),
(10, 'MICHELLIN');

INSERT INTO SERVICO (COD_SERVICO, GARANTIA) VALUES
(2, 1),
(4, 2),
(5, 2),
(7, 1),
(11, 2);

INSERT INTO DEMANDA (COD_ITEM_PECA, COD_ITEM_SERVICO) VALUES
(8, 2),
(8, 4),
(6, 7),
(9, 11),
(3, 11),
(1, 11),
(5, 11);

INSERT INTO EQUIPE (ID_EQUIPE, NOME) VALUES
(NULL, 'EQUIPE 1'),
(NULL, 'EQUIPE 2'),
(NULL, 'EQUIPE 3');

INSERT INTO PERTENCE (ID_EQUIPE, COD_PESSOA) VALUES
(1, 5),
(1, 4),
(1, 1),
(2, 5),
(2, 4),
(3, 1);

-- aplicando as restrições de integridade
-- chaves primárias
alter table PECA add constraint pk_PECA primary key (COD_PECA);
alter table SERVICO add constraint pk_SERVICO primary key (COD_SERVICO);
alter table PERTENCE add constraint pk_PERTENCE primary key CLUSTERED(ID_EQUIPE, COD_PESSOA);
alter table DEMANDA add constraint pk_DEMANDA primary key CLUSTERED(COD_ITEM_PECA, COD_ITEM_SERVICO);

-- chaves estrangeiras
alter table ORDEM_SERVICO add constraint fk_ORDEM_SERVICO_EQUIPE FOREIGN KEY (ID_EQUIPE) references EQUIPE(ID_EQUIPE) on update cascade on delete set NULL;
alter table VEICULO add constraint fk_VEICULO_PESSOA foreign key (COD_PESSOA) references PESSOA(COD_PESSOA) on update cascade on delete set NULL;
alter table ITEM add constraint fk_ITEM_VEICULO foreign key (CHASSI) references VEICULO(CHASSI) on update no action on delete cascade;
alter table PECA add constraint fk_PECA_ITEM foreign key (COD_PECA) references ITEM(COD_ITEM) on update cascade on delete cascade;
alter table SERVICO add constraint fk_SERVICO_ITEM foreign key (COD_SERVICO) references ITEM(COD_ITEM) on update cascade on delete cascade;
alter table DEMANDA add constraint fk_DEMANDA_ITEM_PECA foreign key (COD_ITEM_PECA) references ITEM(COD_ITEM) on update cascade on delete cascade;
alter table DEMANDA add constraint fk_DEMANDA_ITEM_SERVICO foreign key (COD_ITEM_SERVICO) references ITEM(COD_ITEM) on update cascade on delete cascade;
alter table PERTENCE add constraint fk_PERTENCE_EQUIPE foreign key (ID_EQUIPE) references EQUIPE(ID_EQUIPE) on update cascade on delete cascade;
alter table PERTENCE add constraint fk_PERTENCE_PESSOA foreign key (COD_PESSOA) references PESSOA(COD_PESSOA) on update cascade on delete cascade;
