
-- --------------------------------------------
-- --------------------------------------------
-- ----------- MYSQL DATABASE --- -------------
-- --------------------------------------------
-- --------------------------------------------
-- Version: MYSQL 5.7.4 -----------------------
-- Author: Lauro Oliveira----------------------
-- --------------------------------------------

-- DATABASE:
	SET global max_allowed_packet=104857600;
	DROP DATABASE IF EXISTS zippado;
	CREATE DATABASE zippado;
	USE zippado;

-- TABLE:

	CREATE TABLE ARQUIVO(

		ID INT NOT NULL,
		DATA DATETIME DEFAULT CURRENT_TIMESTAMP,
		FILE LONGBLOB NULL

	)ENGINE=INNODB;


-- PRIMARY KEY:

	ALTER TABLE ARQUIVO
	ADD CONSTRAINT PK_AQRUIVOID
	PRIMARY KEY (ID);
	ALTER TABLE ARQUIVO MODIFY COLUMN ID INT NOT NULL AUTO_INCREMENT;



