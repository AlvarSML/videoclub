
DROP TABLE IF EXISTS prestamo;
DROP TABLE IF EXISTS empleado;
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS permisos;
DROP TABLE IF EXISTS video;
DROP TABLE IF EXISTS disco;
DROP TABLE IF EXISTS socio;



CREATE TABLE permisos (
	id_permiso int(2) PRIMARY KEY AUTO_INCREMENT,
	descripcion varchar(100)
);

CREATE TABLE usuario (
	id_usuario int(5) PRIMARY KEY AUTO_INCREMENT,
	pass varchar(100) /*WIP SHA?*/,
	nombre varchar(25) NOT NULL,
	apellidos varchar(50) NOT NULL,
	permiso int(2) NOT NULL,
	FOREIGN KEY (permiso) REFERENCES permisos(id_permiso)
);

/*
CREATE TABLE empleado (
	id_empleado int(5) PRIMARY KEY AUTO_INCREMENT,
	id_usuario int(5),
	posicion varchar(20) NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE socio (
	id_socio int(5) PRIMARY KEY AUTO_INCREMENT,
	id_usuario int(5) ,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);
*/

CREATE TABLE prestamo (
	id_prestamo int(5) PRIMARY KEY AUTO_INCREMENT,
	empleado int(5) ,
	socio int(5) ,
	fecha_inicio date NOT NULL,
	duracion int(3) NOT NULL,
	fecha_entrega date,
	FOREIGN KEY (empleado) REFERENCES usuario(id_usuario),
	FOREIGN KEY (socio) REFERENCES usuario(id_usuario)
);

CREATE TABLE video (
	id_video int(5) PRIMARY KEY AUTO_INCREMENT,
	id_prestamo int(5) ,
	protagonista varchar(70),
	FOREIGN KEY (id_prestamo) REFERENCES prestamo(id_prestamo)
);

CREATE TABLE disco (
	id_disco int(5) PRIMARY KEY AUTO_INCREMENT,
	id_prestamo int(5) ,
	autor varchar(70) NOT NULL,
	FOREIGN KEY (id_prestamo) REFERENCES prestamo(id_prestamo) 
);