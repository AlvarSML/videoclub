DROP TABLE IF EXISTS empleado;
DROP TABLE IF EXISTS socio;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS prestamo;
DROP TABLE IF EXISTS video;
DROP TABLE IF EXISTS disco;


CREATE TABLE usuario (
	id_usuario int(5) PRIMARY KEY AUTO_INCREMENT,
	pass varchar(100) /*WIP SHA?*/,
	nombre varchar(25) NOT NULL,
	apellidos varchar(50) NOT NULL
);

CREATE TABLE empleado (
	id_empleado int(5) PRIMARY KEY AUTO_INCREMENT,
	id_usuario int(5) /**/,
	posicion varchar(20) NOT NULL /*WIP*/,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE socio (
	id_socio int(5) PRIMARY KEY AUTO_INCREMENT,
	id_usuario int(5) ,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);


CREATE TABLE prestamo (
	id_prestamo int(5) PRIMARY KEY AUTO_INCREMENT,
	id_empleado int(5) ,
	id_socio int(5) ,
	fecha_inicio date NOT NULL,
	duracion int(3) NOT NULL,
	fecha_entrega date,
	FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
	FOREIGN KEY (id_socio) REFERENCES socio(id_socio)
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