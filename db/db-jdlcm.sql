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
    FK_Parentesco INT NOT NULL,
    Correo_Electronico VARCHAR(255) NOT NULL,
    constraint pk_Parentesco_id foreign key (FK_Parentesco) references Parentescos(ID_Parentesco) on update cascade on delete cascade
);

-- LLenado de la tabla tutores
INSERT INTO Tutores (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Cedula, Telefono, Direccion, FK_Parentesco, Correo_Electronico) VALUES
('Juan', 'Carlos', 'Perez', 'Gomez', '1234567890', 30012345, 'Calle Falsa 123', 1, 'juan.perez@example.com'),
('Maria', 'Josefa', 'Rodriguez', 'Lopez', '2345678901', 40876543, 'Avenida Siempre Viva 456', 2, 'maria.rodriguez@example.com'),
('Pedro', 'Manuel', 'Gonzalez', 'Martinez', '3456789012', 07654321, 'Boulevard Eterno 789', 3, 'pedro.gonzalez@example.com');

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
    constraint pk_Tutor_id foreign key (FK_Tutor) references Tutores(ID_Tutor) on update cascade on delete cascade,
    constraint pk_Genero_id foreign key (FK_Genero) references Generos(ID_Genero) on update cascade on delete cascade
);

-- LLenado de la tabla estudiantes
INSERT INTO Estudiantes (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Fecha_Nacimiento, Cedula, FK_Genero, Telefono, Direccion, Correo_Electronico, FK_Tutor) VALUES
('Juan', 'Carlos', 'Perez', 'Gomez', '2000-01-01', '12345678901234', 1, 30012345, 'Calle Falsa 123', 'juan.carlos.perez@gmail.com', 1),
('Maria', 'Josefa', 'Rodriguez', 'Lopez', '2005-02-02', '23456789012345', 2, 49876543, 'Avenida Siempre Viva 456', 'maria.josefa.rodriguez@yahoo.com', 2),
('Pedro', 'Manuel', 'Gonzalez', 'Martinez', '2010-03-03', '34567890123456', 1, 07654321, 'Boulevard Eterno 789', 'pedro.manuel.gonzalez@hotmail.com', 3);

-- Creación de la tabla Asignaturas
CREATE TABLE Asignaturas (
	ID_Asignatura INT PRIMARY KEY AUTO_INCREMENT,
    Asignatura ENUM('Lengua y Literatura', 'Lengua Extranjera', 'Matemáticas', 'Ciencias Naturales') NOT NULL
);

-- LLenado de la tabla Asignaturas
INSERT INTO Asignaturas (ID_Asignatura, Asignatura)
VALUES ('1', 'Lengua y Literatura'), ('2', 'Lengua Extranjera'), ('3', 'Matemáticas'), ('4', 'Ciencias Naturales');

-- Creación de la tabla Anio_Lectivo
CREATE TABLE Anio_Lectivo (
	ID_Anio_Lectivo INT PRIMARY KEY AUTO_INCREMENT,
    Anio INT(4) NOT NULL,
    Fecha_Inicio DATE NOT NULL,
    Fecha_Final DATE NOT NULL
);

-- LLenado de la tabla Anio_Lectivo 
INSERT INTO Anio_Lectivo (ID_Anio_Lectivo, Anio, Fecha_Inicio, Fecha_final)
VALUES ('1', '2024', '2024-01-29', '2024-11-29');

-- Creación de la tabla Calificaciones
CREATE TABLE Calificaciones (
    ID_Calificacion INT PRIMARY KEY AUTO_INCREMENT,
    FK_Estudiante INT NOT NULL,
    FK_Asignatura INT NOT NULL,
    Nota INT(2) NOT NULL,
    FK_Anio_Lectivo INT NOT NULL,
    constraint pk_Estudiante_id foreign key (FK_Estudiante) references Estudiantes(ID_Estudiante) on update cascade on delete cascade,
    constraint pk_Asignatura_id foreign key (FK_Asignatura) references Asignaturas(ID_Asignatura) on update cascade on delete cascade,
    constraint pk_Anio_Lectivo_id foreign key (FK_Anio_Lectivo) references Anio_Lectivo(ID_Anio_Lectivo) on update cascade on delete cascade
);

-- LLenado de la tabla calificaciones
INSERT INTO Calificaciones (FK_Estudiante, FK_Asignatura, Nota, FK_Anio_Lectivo) VALUES
(1, 1, 85, 1), -- Calificación para el primer estudiante en Lengua y Literatura para el año 2024
(2, 1, 90, 1), -- Calificación para el segundo estudiante en Lengua y Literatura para el año 2024
(3, 1, 88, 1); -- Calificación para el tercer estudiante en Lengua y Literatura para el año 2024

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

-- Creación de la tabla Grupos
CREATE TABLE Grupos (
	ID_Grupo INT PRIMARY KEY AUTO_INCREMENT,
    FK_Grado INT NOT NULL,
    FK_Seccion INT NOT NULL,
    FK_Turno INT NOT NULL,
    constraint pk_Grados_id foreign key (FK_Grado) references Grados(ID_Grado) on update cascade on delete cascade,
    constraint pk_Secciones_id foreign key (FK_Seccion) references Secciones(ID_Seccion) on update cascade on delete cascade,
    constraint pk_Turnos_id foreign key (FK_Turno) references Turnos(ID_Turno) on update cascade on delete cascade
);

-- LLenado de la tabla Grupos
INSERT INTO Grupos (ID_Grupo, FK_Grado, FK_Seccion, FK_Turno)
VALUES ('1', '1', '1', '1');

-- Creación de la tabla Matrículas
CREATE TABLE Matrículas (
    ID_Matricula INT PRIMARY KEY AUTO_INCREMENT,
    Cod_Matricula VARCHAR(5) NOT NULL,
    FK_Estudiante INT NOT NULL,
    FK_Grupo INT NOT NULL,
    FK_Estado INT NOT NULL,
    FK_Anio_Lectivo INT NOT NULL,
    Fecha_Matricula DATE NOT NULL,
    constraint pk_estudiantes_id foreign key (FK_Estudiante) references Estudiantes(ID_Estudiante) on update cascade on delete cascade,
    constraint pk_Grupos_id foreign key (FK_Grupo) references Grupos(ID_Grupo) on update cascade on delete cascade,
    constraint pk_Estados_id foreign key (FK_Estado) references Estados(ID_Estado) on update cascade on delete cascade,
    constraint pk_Anios_Lectivos_id foreign key (FK_Anio_Lectivo) references Anio_Lectivo(ID_Anio_Lectivo) on update cascade on delete cascade
);

-- LLenado de la tabla Matriculas
INSERT INTO Matrículas (Cod_Matricula, FK_Estudiante, FK_Grupo, FK_Estado, FK_Anio_Lectivo, Fecha_Matricula) VALUES
('M001', 1, 1, 1, 1, '2024-01-01'), -- Matrícula para el primer estudiante
('M002', 2, 1, 1, 1, '2024-01-01'), -- Matrícula para el segundo estudiante
('M003', 3, 1, 1, 1, '2024-01-01'); -- Matrícula para el tercer estudiante

-- Índice en la columna FK_Estudiante de la tabla Matrículas
CREATE INDEX idx_FK_Estudiante ON Matrículas (FK_Estudiante);

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
    constraint pk_Tipos_Users_id foreign key (FK_Tipo_User) references Tipos_Users(ID_Tipo) on update cascade on delete cascade
);

INSERT INTO USERS (FK_Tipo_User, Usuario, Contrasena, Pri_Nombre, Pri_Apellido, Correo_Electronico) VALUES 
(1, 'Keny', '12358', 'Keneth', 'Macis', 'ken123oficial@gmail.com'),
(2, 'dcalero', '12358', 'Michelle', 'Calero', 'dayadri05@gmail.com'),
(2, 'aaleman', '12358', 'Alvaro', 'Aleman', 'alemanalvaro35@gmail.com');

-- Consultas sql de la tabla USERS
SELECT U.Usuario, U.Pri_Nombre, U.Seg_Nombre, U.Pri_Apellido, U.Seg_Apellido, T.Tipo AS Permisos, U.Telefono, U.Correo_Electronico
FROM USERS U
JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo;

