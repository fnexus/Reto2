-- Script de creación de tablas del proyecto

DROP DATABASE   IF     EXISTS FNEXUS;
CREATE DATABASE IF NOT EXISTS FNEXUS;

-- TBLA PERSONA
DROP TABLE PERSONA;
CREATE TABLE PERSONA (
  id int NOT NULL AUTO_INCREMENT,
  -- log in
  nickname varchar(100) NOT NULL UNIQUE,
  password varchar(100) NOT NULL,
  -- informacion personal
  nombre varchar(100) NOT NULL,
  apellidos varchar(100) NOT NULL,
  telefono varchar(100),
  email varchar(100) NOT NULL UNIQUE,
  -- informacion
  foto_perfil varchar(100),
  imagen_banner varchar(100),
  pagina_contacto varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

-- TABLA ANUNCIO
DROP TABLE ANUNCIO;
CREATE TABLE ANUNCIO (
  id int NOT NULL AUTO_INCREMENT,
  persona_id int NOT NULL,
  titulo varchar(100) ,
  descripcion varchar(500) ,
  categoria varchar(100) ,
  datos_contacto varchar(100),
  imagen varchar(100) ,
 	-- fecha de creacion del anuncio
  fecha_creacion TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (persona_id)
        REFERENCES PERSONA(id)
        ON DELETE CASCADE
);
