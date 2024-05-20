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
('Ana', 'María', 'Torres', 'Fernandez', '9876543210', 55512345, 'Carrera Principal 321', 1, 'ana.torres@ejemplo.com'),
('Laura', 'Isabel', 'Morales', 'Rojas', '8765432109', 66676543, 'Transversal Perdido 654', 2, 'laura.morales@ejemplo.com'),
('Carlos', 'Jorge', 'Ramirez', 'Vargas', '7654321098', 77754321, 'Diagonal Desierto 987', 3, 'carlos.ramirez@ejemplo.com'),
('Sofia', 'Patricia', 'Garcia', 'Luna', '6543210987', 88876543, 'Avenida Sol 456', 1, 'sofia.garcia@ejemplo.com'),
('Luis', 'Alejandro', 'Hernandez', 'Guzman', '5432109876', 99954321, 'Boulevard Luna 789', 2, 'luis.hernandez@ejemplo.com'),
('Gabriela', 'Elena', 'Lopez', 'Sanchez', '4321098765', 11154321, 'Calle Estrella 321', 3, 'gabriela.lopez@ejemplo.com'),
('Fernando', 'Ignacio', 'Perez', 'Moreno', '3210987654', 22254321, 'Transversal Estrellas 654', 1, 'fernando.perez@ejemplo.com'),
('Camila', 'Valeria', 'Rodriguez', 'Castillo', '2109876543', 33354321, 'Diagonal Nubes 987', 2, 'camila.rodriguez@ejemplo.com'),
('Daniel', 'Oscar', 'Gonzalez', 'Ortiz', '1876543211', 44454321, 'Carrera Planetas 321', 3, 'daniel.gonzalez@ejemplo.com'),
('Carolina', 'Daniela', 'Torres', 'Figueroa', '1765432109', 55554321, 'Transversal Galaxias 654', 1, 'carolina.torres@ejemplo.com'),
('Alfredo', 'Adrian', 'Ramirez', 'Diaz', '5654321198', 66654321, 'Diagonal Nebulosas 987', 2, 'alfredo.ramirez@ejemplo.com'),
('Victoria', 'Vanessa', 'Morales', 'Romero', '7543210987', 77754321, 'Carrera Quasars 321', 3, 'victoria.morales@ejemplo.com'),
('Manuel', 'Antonio', 'Rodriguez', 'Lopez', '9876543212', 78901234, 'Calle Ejemplo 101', 1, 'manuel.antoniordiguez@gmail.com'),
('Beatriz', 'Francisco', 'Gutierrez', 'Perez', '2345678902', 89012345, 'Avenida Otro 102', 2, 'beatriz.franciscogutierrez@gmail.com'),
('Miguel', 'Maria', 'Jimenez', 'Garcia', '3456789013', 90123456, 'Boulevard Otra 103', 3, 'miguel.mariajimenez@gmail.com');

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
('Pedro', 'Manuel', 'Gonzalez', 'Martinez', '2010-03-03', '34567890123456', 1, 07654321, 'Boulevard Eterno 789', 'pedro.manuel.gonzalez@hotmail.com', 3),
('Ana', 'María', 'Torres', 'Fernandez', '1995-04-04', '98765432101234', 2, 55512345, 'Carrera Principal 321', 'ana.torres@ejemplo.com', 4),
('Carlos', 'Jorge', 'Ramirez', 'Vargas', '2000-05-05', '76543210981234', 1, 77754321, 'Diagonal Desierto 987', 'carlos.ramirez@ejemplo.com', 5),
('Sofia', 'Patricia', 'Garcia', 'Luna', '1996-06-06', '65432109801234', 2, 88876543, 'Avenida Sol 456', 'sofia.garcia@ejemplo.com', 6),
('Luis', 'Alejandro', 'Hernandez', 'Guzman', '2001-07-07', '54321098701234', 1, 99954321, 'Boulevard Luna 789', 'luis.hernandez@ejemplo.com', 7),
('Gabriela', 'Elena', 'Lopez', 'Sanchez', '1997-08-08', '43210987601234', 2, 11154321, 'Calle Estrella 321', 'gabriela.lopez@ejemplo.com', 8),
('Fernando', 'Ignacio', 'Perez', 'Moreno', '2002-09-09', '32109876501234', 1, 22254321, 'Transversal Estrellas 654', 'fernando.perez@ejemplo.com', 9),
('Daniel', 'Oscar', 'Gonzalez', 'Ortiz', '1998-10-10', '98765432101235', 1, 44454321, 'Carrera Planetas 321', 'daniel.oscar.gonzalez@gmail.com', 10),
('Carolina', 'Daniela', 'Torres', 'Figueroa', '1999-11-11', '87654321012336', 2, 55554321, 'Transversal Galaxias 654', 'carolina.daniela.torres@yahoo.com', 11),
('Alfredo', 'Adrian', 'Ramirez', 'Diaz', '2000-12-12', '76543210912337', 1, 66654321, 'Diagonal Nebulosas 987', 'alfredo.adrian.ramirez@hotmail.com', 12),
('Victoria', 'Vanessa', 'Morales', 'Romero', '2001-01-13', '65432109812338', 2, 77754321, 'Carrera Quasars 321', 'victoria.vanessa.morales@gmail.com', 13),
('Manuel', 'Antonio', 'Rodriguez', 'Lopez', '2002-02-14', '54321098712339', 1, 88876543, 'Calle Ejemplo 101', 'manuel.antoniordiguez@yahoo.com', 14),
('Beatriz', 'Francisco', 'Gutierrez', 'Perez', '2003-03-15', '43210987612340', 2, 99954321, 'Avenida Otro 102', 'beatriz.franciscogutierrez@hotmail.com', 15);

-- Creación de la tabla Asignaturas
CREATE TABLE Asignaturas (
	ID_Asignatura INT PRIMARY KEY AUTO_INCREMENT,
    Asignatura ENUM('Matemáticas', 'Lengua Extranjera', 'Lengua Y Literatura', 'Ciencias Naturales', 'Educación Física', 'Química', 'Orientacion Tecnica y Vocacional', 'Física', 'Biología', 'Historia', 'Geografía', 'Economía', 'Sociología', 'Expresión Cultural y Artistica') NOT NULL
);

-- LLenado de la tabla Asignaturas
INSERT INTO Asignaturas (ID_Asignatura, Asignatura) VALUES 
('1', 'Matemáticas'), ('2', 'Lengua Extranjera'), ('3', 'Lengua Y Literatura'), ('4', 'Ciencias Naturales'),
('5', 'Educación Física'), ('6', 'Química'), ('7', 'Orientación Técnica y Vocacional'), 
('8', 'Física'), ('9', 'Biología'), ('10', 'Historia'), ('11', 'Geografía'), 
('12', 'Economía'), ('13', 'Sociología'), ('14', 'Expresión Cultural y Artística');

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
    FK_Asignatura INT NOT NULL,
    Nota INT(100) NOT NULL,
    FK_Anio_Lectivo INT NOT NULL,
    constraint pk_Estudiante_id foreign key (FK_Estudiante) references Estudiantes(ID_Estudiante) on update cascade on delete cascade,
    constraint pk_Asignatura_id foreign key (FK_Asignatura) references Asignaturas(ID_Asignatura) on update cascade on delete cascade,
    constraint pk_Anio_Lectivo_id foreign key (FK_Anio_Lectivo) references Anio_Lectivo(ID_Anio_Lectivo) on update cascade on delete cascade
);

-- LLenado de la tabla calificaciones
-- Insertando calificaciones para el primer estudiante
INSERT INTO Calificaciones (FK_Estudiante, FK_Asignatura, Nota, FK_Anio_Lectivo) VALUES
(1, 1, 85, 1), -- Matemáticas
(1, 2, 90, 1), -- Lengua Extranjera
(1, 3, 90, 1), -- Lengua y Literatura
(1, 4, 88, 1), -- Ciencias Naturales
(1, 5, 92, 1), -- Educación Física
(1, 6, 95, 1), -- Química
(1, 7, 89, 1), -- Orientación Técnica y Vocacional
(1, 8, 93, 1), -- Física
(1, 9, 91, 1), -- Biología
(1, 10, 94, 1), -- Historia
(1, 11, 96, 1), -- Geografía
(1, 12, 97, 1), -- Economía
(1, 13, 98, 1), -- Sociología
(1, 14, 99, 1); -- Expresión Cultural y Artística

-- Insertando calificaciones para el segundo estudiante
INSERT INTO Calificaciones (FK_Estudiante, FK_Asignatura, Nota, FK_Anio_Lectivo) VALUES
(2, 1, 80, 1), -- Matemáticas
(2, 2, 75, 1), -- Lengua Extranjera
(2, 3, 75, 1), -- Lengua y Literatura
(2, 4, 78, 1), -- Ciencias Naturales
(2, 5, 82, 1), -- Educación Física
(2, 6, 77, 1), -- Química
(2, 7, 79, 1), -- Orientación Técnica y Vocacional
(2, 8, 76, 1), -- Física
(2, 9, 81, 1), -- Biología
(2, 10, 74, 1), -- Historia
(2, 11, 73, 1), -- Geografía
(2, 12, 72, 1), -- Economía
(2, 13, 71, 1), -- Sociología
(2, 14, 70, 1); -- Expresión Cultural y Artística

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

-- Creación de la tabla Grupos
CREATE TABLE Grupos (
	ID_Grupo INT PRIMARY KEY AUTO_INCREMENT,
    FK_Grado INT NOT NULL,
    FK_Seccion INT NOT NULL,
    constraint pk_Grados_id foreign key (FK_Grado) references Grados(ID_Grado) on update cascade on delete cascade,
    constraint pk_Secciones_id foreign key (FK_Seccion) references Secciones(ID_Seccion) on update cascade on delete cascade
);

-- LLenado de la tabla Grupos
INSERT INTO Grupos (ID_Grupo, FK_Grado, FK_Seccion) VALUES 
(1, 1, 1), -- Primer grado, sección A
(2, 1, 2), -- Primer grado, sección B
(3, 1, 3), -- Primer grado, sección C
(4, 2, 1), -- Segundo grado, sección A
(5, 2, 2), -- Segundo grado, sección B
(6, 2, 3), -- Segundo grado, sección C
(7, 3, 1), -- Tercer grado, sección A
(8, 3, 2), -- Tercer grado, sección B
(9, 3, 3), -- Tercer grado, sección C
(10, 4, 1), -- Cuarto grado, sección A
(11, 4, 2), -- Cuarto grado, sección B
(12, 4, 3), -- Cuarto grado, sección C
(13, 5, 1), -- Quinto grado, sección A
(14, 5, 2), -- Quinto grado, sección B
(15, 5, 3), -- Quinto grado, sección C
(16, 6, 1), -- Sexto grado, sección A
(17, 6, 2), -- Sexto grado, sección B
(18, 6, 3), -- Sexto grado, sección C
(19, 7, 1), -- Séptimo grado, sección A
(20, 7, 2), -- Séptimo grado, sección B
(21, 7, 3), -- Séptimo grado, sección C
(22, 8, 1), -- Octavo grado, sección A
(23, 8, 2), -- Octavo grado, sección B
(24, 8, 3), -- Octavo grado, sección C
(25, 9, 1), -- Noveno grado, sección A
(26, 9, 2), -- Noveno grado, sección B
(27, 9, 3), -- Noveno grado, sección C
(28, 10, 1), -- Décimo grado, sección A
(29, 10, 2), -- Décimo grado, sección B
(30, 10, 3), -- Décimo grado, sección C
(31, 11, 1), -- Undécimo grado, sección A
(32, 11, 2), -- Undécimo grado, sección B
(33, 11, 3); -- Undécimo grado, sección C

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
    FK_Grupo INT NOT NULL,
    FK_Turno INT NOT NULL,
    FK_Estado INT NOT NULL,
    FK_Anio_Lectivo INT NOT NULL,
    Fecha_Matricula DATE NOT NULL,
    constraint pk_estudiantes_id foreign key (FK_Estudiante) references Estudiantes(ID_Estudiante) on update cascade on delete cascade,
    constraint pk_Grupos_id foreign key (FK_Grupo) references Grupos(ID_Grupo) on update cascade on delete cascade,
    constraint pk_Estados_id foreign key (FK_Estado) references Estados(ID_Estado) on update cascade on delete cascade,
    constraint pk_Anios_Lectivos_id foreign key (FK_Anio_Lectivo) references Anio_Lectivo(ID_Anio_Lectivo) on update cascade on delete cascade,
    constraint pk_Turnos_id foreign key (FK_Turno) references Turnos(ID_Turno) on update cascade on delete cascade
);

-- LLenado de la tabla Matriculas
INSERT INTO Matriculas (Cod_Matricula, FK_Estudiante, FK_Grupo, FK_Turno, FK_Estado, FK_Anio_Lectivo, Fecha_Matricula) VALUES
('M001', 1, 1, 1, 1, 1, '2024-01-01'), -- Matrícula para el primer estudiante
('M002', 2, 1, 1, 1, 1, '2024-01-01'), -- Matrícula para el segundo estudiante
('M003', 3, 1, 1, 1, 1, '2024-01-01'), -- Matrícula para el tercer estudiante
('M004', 4, 2, 1, 2, 1, '2024-01-01'), -- Matrícula para el cuarto estudiante
('M005', 5, 6, 2, 2, 1, '2024-01-01'), -- Matrícula para el quinto estudiante
('M006', 6, 1, 1, 1, 1, '2024-01-01'),
('M007', 7, 2, 1, 1, 1, '2024-01-01'),
('M008', 8, 3, 1, 1, 1, '2024-01-01'),
('M009', 9, 4, 1, 2, 1, '2024-01-01'),
('M010', 10, 5, 2, 2, 1, '2024-01-01'),
('M011', 11, 6, 2, 2, 1, '2024-01-01'),
('M012', 12, 7, 1, 1, 1, '2024-01-01'),
('M013', 13, 8, 1, 2, 1, '2024-01-01'),
('M014', 14, 9, 2, 2, 1, '2024-01-01'),
('M015', 15, 10, 1, 1, 1, '2024-01-01'); 

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

INSERT INTO USERS (FK_Tipo_User, Usuario, Contrasena, Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Telefono, Correo_Electronico) VALUES 
(1, 'Keny', '12358', 'Keneth', 'Ernesto', 'Macis', 'Flores', '87947283', 'ken123oficial@gmail.com'),
(2, 'dcalero', '12358', 'Dayana', 'Michelle', 'Calero', '', '77233249','dayadri05@gmail.com'),
(2, 'aaleman', '12358', 'Alvaro', 'Alexander', 'Aleman', '', '57913541', 'alemanalvaro35@gmail.com');

-- Consultas sql de la tabla USERS
SELECT U.ID_USER, U.Usuario, U.Pri_Nombre, U.Seg_Nombre, U.Pri_Apellido, U.Seg_Apellido, T.Tipo AS Permisos, U.Telefono, U.Correo_Electronico
FROM USERS U
JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo;

-- Consulta de la tabla Grupos
SELECT 
    G.ID_Grupo, 
    CONCAT(Gd.Grado, " ", Sec.Seccion) AS Grupo
FROM 
    Grupos G 
INNER JOIN 
    Grados Gd ON G.FK_Grado = Gd.ID_Grado
INNER JOIN 
    Secciones Sec ON G.FK_Seccion = Sec.ID_Seccion
ORDER BY 
    G.ID_Grupo ASC, -- Ordena por ID_Grupo en orden ascendente
    Gd.Grado ASC,   -- Ordena por Grado en orden ascendente
    Sec.Seccion ASC; -- Ordena por Sección en orden ascendente

-- Consulta Estudiante
SELECT E.*, 
    CONCAT(Tut.Pri_Nombre, ' ', Tut.Seg_Nombre, ' ', Tut.Pri_Apellido, ' ', Tut.Seg_Apellido) AS TutorNombreCompletoTutor
FROM Estudiantes E
INNER JOIN Tutores Tut ON E.FK_Tutor = Tut.ID_Tutor;

-- Conculta Calificaciones
SELECT 
    c.FK_Estudiante AS Estudiante_ID,
    concat(e.Pri_Nombre, " ", e.Pri_Apellido) AS Nombre_Estudiante, -- Asumiendo que tienes una columna Nombre en la tabla Estudiantes
    a.Asignatura AS Asignatura,
    c.Nota AS Nota
FROM 
    Calificaciones c
JOIN 
    Estudiantes e ON c.FK_Estudiante = e.ID_Estudiante
JOIN 
    Asignaturas a ON c.FK_Asignatura = a.ID_Asignatura
WHERE 
    c.FK_Estudiante IN (1, 2) -- Filtra por los IDs de los estudiantes
ORDER BY 
    c.FK_Estudiante, a.Asignatura; -- Ordena por estudiante y luego por asignatura

-- Consulta de la tabla Matriculas    
SELECT 
    M.ID_Matricula, 
    M.Cod_Matricula, 
    E.Pri_Nombre, 
    E.Seg_Nombre, 
    E.Pri_Apellido, 
    E.Seg_Apellido, 
    E.Telefono, 
    CONCAT(Gr.Grado, ' ', Sec.Seccion) AS Grupo, 
    T.Turno, 
    Est.Estado, 
    E.Direccion, 
    A.Anio, 
    M.Fecha_Matricula,
    Tut.Pri_Nombre AS T_Pri_Nombre, 
    Tut.Seg_Nombre AS T_Seg_Nombre, 
    Tut.Pri_Apellido AS T_Pri_Apellido, 
    Tut.Seg_Apellido AS T_Seg_Apellido
FROM 
    Matriculas M
INNER JOIN 
    Estudiantes E ON M.FK_Estudiante = E.ID_Estudiante
INNER JOIN 
    Turnos T ON M.FK_Turno = T.ID_Turno
INNER JOIN 
    Estados Est ON M.FK_Estado = Est.ID_Estado
INNER JOIN 
    Anio_Lectivo A ON M.FK_Anio_Lectivo = A.ID_Anio_Lectivo
INNER JOIN 
    Grupos G ON M.FK_Grupo = G.ID_Grupo
INNER JOIN 
    Grados Gr ON G.FK_Grado = Gr.ID_Grado
INNER JOIN 
    Secciones Sec ON G.FK_Seccion = Sec.ID_Seccion
INNER JOIN 
    Tutores Tut ON E.FK_Tutor = Tut.ID_Tutor;