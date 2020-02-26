CREATE DATABASE m2l CHARACTER SET utf8 COLLATE utf8_general_ci;

USE m2l;

CREATE TABLE ligue
(
  id_ligue bigint(11) AUTO_INCREMENT,
  lib_ligue varchar(50),
  CONSTRAINT PK_ligue PRIMARY KEY (id_ligue)
)ENGINE=InnoDB;

CREATE TABLE usertype
(
  id_usertype bigint(11) AUTO_INCREMENT,
  lib_usertype varchar(50),
  description varchar(50),
  CONSTRAINT PK_usertype PRIMARY KEY (id_usertype)
)ENGINE=InnoDB;

CREATE TABLE `user`
(
  id_user bigint(11) AUTO_INCREMENT,
  pseudo varchar(50) NOT NULL UNIQUE,
  mdp varchar(100) NOT NULL,
  mail varchar(50) NOT NULL UNIQUE,
  id_usertype bigint(11),
  id_ligue bigint(11),  
  CONSTRAINT PK_user PRIMARY KEY (id_user),
  CONSTRAINT FK_user_id_usertype FOREIGN KEY (id_usertype)
  REFERENCES usertype (id_usertype),
  CONSTRAINT FK_user_id_ligue FOREIGN KEY (id_ligue)
  REFERENCES ligue (id_ligue)
)ENGINE=InnoDB;

CREATE TABLE faq
(
  id_faq bigint(11) AUTO_INCREMENT,
  question text,
  reponse text,
  dat_question datetime,
  dat_reponse datetime,
  id_user bigint(11),  
  CONSTRAINT PK_faq PRIMARY KEY (id_faq),
  CONSTRAINT FK_faq_id_user FOREIGN KEY (id_user)
  REFERENCES user (id_user)
)ENGINE=InnoDB;

INSERT INTO ligue 
VALUES
 (1,"Ligue de football"),
 (2,"Ligue de basket"),
 (3,"Ligue de volley"), 
(4,"Ligue de handball"), 
(5,"Toutes les ligues");

INSERT INTO usertype 
VALUES 
(1,"utilisateur","utilisateur de base"), 
(2,"admin","administrateur de ligue"), 
(3,"super-admin","administrateur de toutes les ligues");
