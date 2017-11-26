CREATE DATABASE tpi_evaluacion;
USE tpi_evaluacion;


CREATE TABLE tbl_usuario(
    id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	email VARCHAR(100) UNIQUE NOT NULL,
	password VARCHAR(100) NOT NULL
);

CREATE TABLE tbl_profesor(
	id_profesor INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	nombre_profesor VARCHAR(100),
	carrera_profesor VARCHAR(100),
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario)
);

CREATE TABLE tbl_materia(
	id_materia INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	codigo_materia VARCHAR(10) UNIQUE,
	nombre_materia VARCHAR(100),
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario)
);

CREATE TABLE tbl_detalle_materia_profesor(
	id_detalle_materia_profesor  INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_profesor INT NOT NULL,
	id_materia INT NOT NULL,
	FOREIGN KEY (id_profesor) REFERENCES tbl_profesor(id_profesor),
	FOREIGN KEY (id_materia) REFERENCES tbl_materia(id_materia)
);

CREATE TABLE tbl_evaluacion(
	id_evaluacion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	id_profesor INT NOT NULL,
	id_materia INT NOT NULL,
	nombre_evaluacion VARCHAR(200),
	fecha_creacion DATETIME,
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario),
	FOREIGN KEY (id_profesor) REFERENCES tbl_profesor(id_profesor),
	FOREIGN KEY (id_materia) REFERENCES tbl_materia(id_materia)
);

CREATE TABLE tbl_seccion_evaluacion(
	id_seccion_evaluacion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_evaluacion INT NOT NULL,
	nombre_seccion VARCHAR(150),
	fecha_creacion DATETIME,
	FOREIGN KEY (id_evaluacion) REFERENCES tbl_evaluacion(id_evaluacion)
);

CREATE TABLE tbl_criterio_seccion(
	id_criterio_seccion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_seccion_evaluacion INT NOT NULL,
	nombre_criterio VARCHAR(200),
	fecha_creacion DATETIME,
	minimo INT NOT NULL,
	maximo INT NOT NULL,
	FOREIGN KEY (id_seccion_evaluacion) REFERENCES tbl_seccion_evaluacion(id_seccion_evaluacion)
);

CREATE TABLE tbl_respuesta_evaluacion(
	id_respuesta_evaluacion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_evaluacion INT NOT NULL,
	fecha_creacion DATETIME,
	FOREIGN KEY (id_evaluacion) REFERENCES tbl_evaluacion(id_evaluacion)
);

CREATE TABLE tbl_respuesta_criterio(
	id_respuesta_criterio INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_respuesta_evaluacion INT NOT NULL,
	id_seccion_evaluacion INT NOT NULL,
	id_criterio_seccion INT NOT NULL,
	valor INT NOT NULL,
	FOREIGN KEY (id_respuesta_evaluacion) REFERENCES tbl_respuesta_evaluacion(id_respuesta_evaluacion),
	FOREIGN KEY (id_seccion_evaluacion) REFERENCES tbl_seccion_evaluacion(id_seccion_evaluacion),
	FOREIGN KEY (id_criterio_seccion) REFERENCES tbl_criterio_seccion(id_criterio_seccion)
);