-- Creación de la base de datos (si no existe)
CREATE DATABASE IF NOT EXISTS gestion_escolar_jdlcm;

-- Usar la base de datos gestion_escolar
USE gestion_escolar_jdlcm;

-- Creación de la tabla Parentescos
CREATE TABLE Parentescos (
	ID_Parentesco INT PRIMARY KEY AUTO_INCREMENT,
    Parentesco ENUM('Padre', 'Madre', 'Tutor Legal') NOT NULL
);
-- LLenado de la tabla Parentescos
INSERT INTO Parentescos (ID_Parentesco, Parentesco) 
VALUES ('1', 'Padre'), ('2', 'Madre'), ('3', 'Tutor Legal');

-- Creación de la tabla Tutores
CREATE TABLE Tutores (
    ID_Tutor INT PRIMARY KEY AUTO_INCREMENT,
    Pri_Nombre VARCHAR(20) NOT NULL,
    Seg_Nombre VARCHAR(20),
    Pri_Apellido VARCHAR(20) NOT NULL,
    Seg_Apellido VARCHAR(20),
    Cedula VARCHAR(25) NOT NULL UNIQUE,
    Telefono INT(8) NOT NULL,
    Direccion VARCHAR(45) NOT NULL,
    Correo_Electronico VARCHAR(255) NOT NULL
);

-- LLenado de la tabla tutores
INSERT INTO Tutores (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Cedula, Telefono, Direccion, Correo_Electronico) VALUES
('Ana', 'María', 'Torres', 'Fernandez', '9876543210', 55512345, 'Carrera Principal 321', 'ana.torres@ejemplo.com'),
('Laura', 'Isabel', 'Morales', 'Rojas', '8765432109', 66676543, 'Transversal Perdido 654', 'laura.morales@ejemplo.com'),
('Carlos', 'Jorge', 'Ramirez', 'Vargas', '7654321098', 77754321, 'Diagonal Desierto 987', 'carlos.ramirez@ejemplo.com'),
('Sofia', 'Patricia', 'Garcia', 'Luna', '6543210987', 88876543, 'Avenida Sol 456', 'sofia.garcia@ejemplo.com'),
('Luis', 'Alejandro', 'Hernandez', 'Guzman', '5432109876', 99954321, 'Boulevard Luna 789', 'luis.hernandez@ejemplo.com'),
('Gabriela', 'Elena', 'Lopez', 'Sanchez', '4321098765', 11154321, 'Calle Estrella 321', 'gabriela.lopez@ejemplo.com'),
('Fernando', 'Ignacio', 'Perez', 'Moreno', '3210987654', 22254321, 'Transversal Estrellas 654', 'fernando.perez@ejemplo.com'),
('Camila', 'Valeria', 'Rodriguez', 'Castillo', '2109876543', 33354321, 'Diagonal Nubes 987', 'camila.rodriguez@ejemplo.com'),
('Daniel', 'Oscar', 'Gonzalez', 'Ortiz', '1876543211', 44454321, 'Carrera Planetas 321', 'daniel.gonzalez@ejemplo.com'),
('Carolina', 'Daniela', 'Torres', 'Figueroa', '1765432109', 55554321, 'Transversal Galaxias 654', 'carolina.torres@ejemplo.com'),
('Alfredo', 'Adrian', 'Ramirez', 'Diaz', '5654321198', 66654321, 'Diagonal Nebulosas 987', 'alfredo.ramirez@ejemplo.com'),
('Victoria', 'Vanessa', 'Morales', 'Romero', '7543210987', 77754321, 'Carrera Quasars 321', 'victoria.morales@ejemplo.com'),
('Manuel', 'Antonio', 'Rodriguez', 'Lopez', '9876543212', 78901234, 'Calle Ejemplo 101', 'manuel.antoniordiguez@gmail.com'),
('Beatriz', 'Francisco', 'Gutierrez', 'Perez', '2345678902', 89012345, 'Avenida Otro 102', 'beatriz.franciscogutierrez@gmail.com'),
('Miguel', 'Maria', 'Jimenez', 'Garcia', '3456789013', 90123456, 'Boulevard Otra 103', 'miguel.mariajimenez@gmail.com');

-- Creación de la tabla Generos
CREATE TABLE Generos (
	ID_Genero INT PRIMARY KEY AUTO_INCREMENT,
    Genero ENUM('Masculino', 'Femenino') NOT NULL
);

-- LLenado de la tabla Generos
INSERT INTO Generos (ID_Genero, Genero)
VALUES ('1', 'Masculino'), ('2', 'Femenino');

-- Creación de la tabla Estudiantes
CREATE TABLE Estudiantes (
    ID_Estudiante INT PRIMARY KEY AUTO_INCREMENT,
    Pri_Nombre VARCHAR(20) NOT NULL,
    Seg_Nombre VARCHAR(20),
    Pri_Apellido VARCHAR(20) NOT NULL,
    Seg_Apellido VARCHAR(20),
    Fecha_Nacimiento DATE NOT NULL,
    Cedula VARCHAR(25) UNIQUE,
    FK_Genero INT NOT NULL,
    Telefono INT(8) NOT NULL,
    Direccion VARCHAR(45) NOT NULL,
    Correo_Electronico VARCHAR(45) NOT NULL,
    FK_Tutor INT NOT NULL,
    FK_Parentesco INT NOT NULL,
    constraint pk_Tutor_id foreign key (FK_Tutor) references Tutores(ID_Tutor) on update cascade on delete cascade,
    constraint pk_Genero_id foreign key (FK_Genero) references Generos(ID_Genero) on update cascade on delete cascade,
    constraint pk_Parentesco_id foreign key (FK_Parentesco) references Parentescos(ID_Parentesco) on update cascade on delete cascade
);

-- LLenado de la tabla estudiantes
INSERT INTO Estudiantes (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Fecha_Nacimiento, Cedula, FK_Genero, Telefono, Direccion, Correo_Electronico, FK_Tutor, FK_Parentesco) VALUES
('Juan', 'Carlos', 'Perez', 'Gomez', '2000-01-01', '12345678901234', 1, 30012345, 'Calle Falsa 123', 'juan.carlos.perez@gmail.com', 1, 1),
('Maria', 'Josefa', 'Rodriguez', 'Lopez', '2005-02-02', '23456789012345', 2, 49876543, 'Avenida Siempre Viva 456', 'maria.josefa.rodriguez@yahoo.com', 2, 2),
('Pedro', 'Manuel', 'Gonzalez', 'Martinez', '2010-03-03', '34567890123456', 1, 07654321, 'Boulevard Eterno 789', 'pedro.manuel.gonzalez@hotmail.com', 3, 3),
('Ana', 'María', 'Torres', 'Fernandez', '1995-04-04', '98765432101234', 2, 55512345, 'Carrera Principal 321', 'ana.torres@ejemplo.com', 4, 1),
('Carlos', 'Jorge', 'Ramirez', 'Vargas', '2000-05-05', '76543210981234', 1, 77754321, 'Diagonal Desierto 987', 'carlos.ramirez@ejemplo.com', 5, 2),
('Sofia', 'Patricia', 'Garcia', 'Luna', '1996-06-06', '65432109801234', 2, 88876543, 'Avenida Sol 456', 'sofia.garcia@ejemplo.com', 6, 3),
('Luis', 'Alejandro', 'Hernandez', 'Guzman', '2001-07-07', '54321098701234', 1, 99954321, 'Boulevard Luna 789', 'luis.hernandez@ejemplo.com', 7, 1),
('Gabriela', 'Elena', 'Lopez', 'Sanchez', '1997-08-08', '43210987601234', 2, 11154321, 'Calle Estrella 321', 'gabriela.lopez@ejemplo.com', 8, 2),
('Fernando', 'Ignacio', 'Perez', 'Moreno', '2002-09-09', '32109876501234', 1, 22254321, 'Transversal Estrellas 654', 'fernando.perez@ejemplo.com', 9, 3),
('Daniel', 'Oscar', 'Gonzalez', 'Ortiz', '1998-10-10', '98765432101235', 1, 44454321, 'Carrera Planetas 321', 'daniel.oscar.gonzalez@gmail.com', 10, 1),
('Carolina', 'Daniela', 'Torres', 'Figueroa', '1999-11-11', '87654321012336', 2, 55554321, 'Transversal Galaxias 654', 'carolina.daniela.torres@yahoo.com', 11, 2),
('Alfredo', 'Adrian', 'Ramirez', 'Diaz', '2000-12-12', '76543210912337', 1, 66654321, 'Diagonal Nebulosas 987', 'alfredo.adrian.ramirez@hotmail.com', 12, 3),
('Victoria', 'Vanessa', 'Morales', 'Romero', '2001-01-13', '65432109812338', 2, 77754321, 'Carrera Quasars 321', 'victoria.vanessa.morales@gmail.com', 13, 1),
('Manuel', 'Antonio', 'Rodriguez', 'Lopez', '2002-02-14', '54321098712339', 1, 88876543, 'Calle Ejemplo 101', 'manuel.antoniordiguez@yahoo.com', 14, 2),
('Beatriz', 'Francisco', 'Gutierrez', 'Perez', '2003-03-15', '43210987612340', 2, 99954321, 'Avenida Otro 102', 'beatriz.franciscogutierrez@hotmail.com', 15, 3);

-- Creación de la tabla Anio_Lectivo
CREATE TABLE Anio_Lectivo (
	ID_Anio_Lectivo INT PRIMARY KEY AUTO_INCREMENT,
    Anio INT(4) NOT NULL,
    Fecha_Inicio DATE NOT NULL,
    Fecha_Final DATE NOT NULL,
    Estado ENUM('Activo', 'Desactivo') NOT NULL
);

-- LLenado de la tabla Anio_Lectivo 
INSERT INTO Anio_Lectivo (ID_Anio_Lectivo, Anio, Fecha_Inicio, Fecha_final, Estado)VALUES 
('1', '2024', '2024-01-29', '2024-11-29', 'Activo'),
('2', '2023', '2023-01-29', '2023-11-29', 'Desactivo'),
('3', '2022', '2022-01-29', '2022-11-29', 'Desactivo'),
('4', '2021', '2021-01-29', '2021-11-29', 'Desactivo');

-- Creación de la tabla Calificaciones
CREATE TABLE Calificaciones (
    ID_Calificacion INT PRIMARY KEY AUTO_INCREMENT,
    FK_Estudiante INT NOT NULL,
    Matematica INT(100),
    Lengua_Extranjera INT(100),
    Lengua_Literatura INT(100),
    Ciencias_Naturales INT(100),
    Educacion_Fisica INT(100),
    Quimica INT(100),
    OTV INT(100),
    Fisica INT(100),
    Biologia INT(100),
    Historia INT(100),
    Geografia INT(100),
    Economia INT(100),
    Sociologia INT(100),
    ECA INT(100),
    FK_Anio_Lectivo INT NOT NULL,
    FK_Grado INT NOT NULL,
    constraint pk_Estudiante_id foreign key (FK_Estudiante) references Estudiantes(ID_Estudiante) on update cascade on delete cascade,
    constraint pk_Anio_Lectivo_id foreign key (FK_Anio_Lectivo) references Anio_Lectivo(ID_Anio_Lectivo) on update cascade on delete cascade,
    constraint pk_Grado_id foreign key (FK_Grado) references Grados(ID_Grado) on update cascade on delete cascade
);

-- LLenado de la tabla calificaciones
INSERT INTO Calificaciones (FK_Estudiante, Matematica, Lengua_Extranjera, Lengua_Literatura, Ciencias_Naturales, Educacion_Fisica, Quimica, OTV, Fisica, Biologia, Historia, Geografia, Economia, Sociologia, ECA, FK_Anio_Lectivo, FK_Grado) VALUES 
(1, 85, 90, 88, 92, 80, 75, 70, 78, 85, 89, 86, 83, 87, 90, 1, 1),
(2, 80, 82, 84, 88, 76, 71, 69, 77, 84, 88, 85, 82, 86, 89, 1, 1),
(3, 85, 90, 88, 92, 80, 75, 70, 78, 85, 89, 86, 83, 87, 90, 1, 2),
(4, 80, 82, 84, 88, 76, 71, 69, 77, 84, 88, 85, 82, 86, 89, 1, 3),
(5, 85, 90, 88, 92, 80, 75, 70, 78, 85, 89, 86, 83, 87, 90, 1, 2),
(6, 80, 82, 84, 88, 76, 71, 69, 77, 84, 88, 85, 82, 86, 89, 1, 5),
(7, 85, 90, 88, 92, 80, 75, 70, 78, 85, 89, 86, 83, 87, 90, 1, 3),
(8, 80, 82, 84, 88, 76, 71, 69, 77, 84, 88, 85, 82, 86, 89, 1, 1),
(9, 85, 90, 88, 92, 80, 75, 70, 78, 85, 89, 86, 83, 87, 90, 1, 5),
(10, 80, 82, 84, 88, 76, 71, 69, 77, 84, 88, 85, 82, 86, 89, 1, 2),
(11, 85, 90, 88, 92, 80, 75, 70, 78, 85, 89, 86, 83, 87, 90, 1, 3),
(12, 80, 82, 84, 88, 76, 71, 69, 77, 84, 88, 85, 82, 86, 89, 1, 2),
(13, 85, 90, 88, 92, 80, 75, 70, 78, 85, 89, 86, 83, 87, 90, 1, 1),
(14, 80, 82, 84, 88, 76, 71, 69, 77, 84, 88, 85, 82, 86, 89, 1, 6),
(15, 95, 93, 91, 96, 85, 76, 72, 79, 86, 90, 87, 84, 88, 91, 1, 4);

-- Creacón de la tabla Grados
CREATE TABLE Grados (
	ID_Grado INT PRIMARY KEY AUTO_INCREMENT,
    Grado ENUM('1ro', '2do', '3ro', '4to', '5to', '6to', '7mo', '8vo', '9no', '10mo', '11vo') NOT NULL
);

-- LLEnado de la tabla Grados
INSERT INTO Grados (ID_Grado, Grado)
VALUES ('1', '1ro'), ('2', '2do'), ('3', '3ro'), ('4', '4to'), ('5', '5to'), ('6', '6to'), ('7', '7mo'), ('8', '8vo'), ('9', '9no'), ('10', '10mo'), ('11', '11vo');

-- Creación de la tabla Secciones
CREATE TABLE Secciones (
	ID_Seccion INT PRIMARY KEY AUTO_INCREMENT,
    Seccion ENUM('A', 'B', 'C') NOT NULL
);

-- Llenado de la tabla Secciones
INSERT INTO Secciones (ID_Seccion, Seccion)
VALUES ('1', 'A'), ('2', 'B'), ('3', 'C');

-- Creación de la tabla Turnos
CREATE TABLE Turnos (
	ID_Turno INT PRIMARY KEY AUTO_INCREMENT,
    Turno ENUM('Matutino', 'Vespertido') NOT NULL
);

-- LLenado de la tabla Turnos
INSERT INTO Turnos (Turno) VALUES ('Matutino'), ('Vespertido');

-- Creación de la tabla Estados
CREATE TABLE Estados (
	ID_Estado INT PRIMARY KEY AUTO_INCREMENT,
    Estado ENUM('Reingreso', 'Nuevo Ingreso') NOT NULL
);

-- LLenado de la tabla Estados
INSERT INTO Estados (ID_Estado, Estado)
VALUES ('1', 'Reingreso'), ('2', 'Nuevo Ingreso');

-- Creación de la tabla Matrículas
CREATE TABLE Matriculas (
    ID_Matricula INT PRIMARY KEY AUTO_INCREMENT,
    Cod_Matricula VARCHAR(5) NOT NULL,
    FK_Estudiante INT NOT NULL,
    FK_Grado INT NOT NULL,
    FK_Seccion INT NOT NULL,
    FK_Turno INT NOT NULL,
    FK_Estado INT NOT NULL,
    FK_Anio_Lectivo INT NOT NULL,
    Fecha_Matricula DATE NOT NULL,
    constraint pk_estudiantes_id foreign key (FK_Estudiante) references Estudiantes(ID_Estudiante) on update cascade on delete cascade,
    constraint pk_Estados_id foreign key (FK_Estado) references Estados(ID_Estado) on update cascade on delete cascade,
    constraint pk_Anios_Lectivos_id foreign key (FK_Anio_Lectivo) references Anio_Lectivo(ID_Anio_Lectivo) on update cascade on delete cascade,
    constraint pk_Turnos_id foreign key (FK_Turno) references Turnos(ID_Turno) on update cascade on delete cascade,
    constraint pk_Grados_id foreign key (FK_Grado) references Grados(ID_Grado) on update cascade on delete cascade,
    constraint pk_Secciones_id foreign key (FK_Seccion) references Secciones(ID_Seccion) on update cascade on delete cascade
);

-- LLenado de la tabla Matriculas
INSERT INTO Matriculas (Cod_Matricula, FK_Estudiante, FK_Grado, FK_Seccion, FK_Turno, FK_Estado, FK_Anio_Lectivo, Fecha_Matricula) VALUES
('M001', 1, 1, 1, 1, 1, 2, CURDATE()),
('M002', 2, 11, 1, 1, 1, 1, CURDATE()),
('M003', 3, 4, 1, 1, 1, 1, CURDATE()),
('M004', 4, 2, 1, 1, 2, 1, CURDATE()),
('M005', 5, 6, 1, 2, 2, 1, CURDATE()),
('M006', 6, 1, 1, 1, 1, 1, CURDATE()),
('M007', 7, 2, 1, 1, 1, 1, CURDATE()),
('M008', 8, 3, 1, 1, 1, 1, CURDATE()),
('M009', 9, 4, 1, 1, 2, 1, CURDATE()),
('M010', 10, 5, 1, 2, 2, 1, CURDATE()),
('M011', 11, 6, 1, 2, 2, 1, CURDATE()),
('M012', 12, 7, 1, 1, 1, 1, CURDATE()),
('M013', 13, 8, 1, 1, 2, 1, CURDATE()),
('M014', 1, 2, 1, 1, 2, 1, CURDATE());

-- Índice en la columna FK_Estudiante de la tabla Matrículas
CREATE INDEX idx_FK_Estudiante ON Matriculas (FK_Estudiante);

-- Creacion de la tabla Tipos_Users    
CREATE TABLE Tipos_Users (
	ID_Tipo INT PRIMARY KEY AUTO_INCREMENT,
    Tipo ENUM('admin', 'secretario') NOT NULL
);

-- LLenado de la tabla Tipos_Users
INSERT INTO Tipos_Users (ID_Tipo, Tipo)
VALUES ('1', 'admin'), ('2', 'secretario');

-- Creación de la tabla USERS
CREATE TABLE USERS (
    ID_USER INT PRIMARY KEY AUTO_INCREMENT,
    FK_Tipo_User INT NOT NULL,
    Usuario VARCHAR(20) NOT NULL,
    Contrasena INT NOT NULL,
    Pri_Nombre VARCHAR(20) NOT NULL,
    Seg_Nombre VARCHAR(20),
    Pri_Apellido VARCHAR(20) NOT NULL,
    Seg_Apellido VARCHAR(20),
    Telefono INT(8),
    Correo_Electronico VARCHAR(45) NOT NULL,
    imagen varchar(250),
    constraint pk_Tipos_Users_id foreign key (FK_Tipo_User) references Tipos_Users(ID_Tipo) on update cascade on delete cascade
);

INSERT INTO USERS (FK_Tipo_User, Usuario, Contrasena, Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Telefono, Correo_Electronico, imagen) VALUES 
(1, 'Keny', '12358', 'Keneth', 'Ernesto', 'Macis', 'Flores', '87947283', 'ken123oficial@gmail.com', '' ),
(2, 'dcalero', '12358', 'Dayana', 'Michelle', 'Calero', '', '77233249','dayadri05@gmail.com' , ''),
(2, 'aaleman', '12358', 'Alvaro', 'Alexander', 'Aleman', '', '57913541', 'alemanalvaro35@gmail.com', '');