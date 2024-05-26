-- Procedimientos almacenados
USE gestion_escolar_jdlcm;

-- ----------------------------------------------------------------------------------------------------------------------
-- Crear un nuevo tutor
DELIMITER //
CREATE PROCEDURE sp_create_tutor(
IN Pri_Nombre VARCHAR(20),
Seg_Nombre VARCHAR(20),
Pri_Apellido VARCHAR(20),
Seg_Apellido VARCHAR(20),
Cedula VARCHAR(25),
Telefono INT,
Direccion VARCHAR(45) ,
FK_Parentesco INT ,
Correo_Electronico VARCHAR(255))
BEGIN
    INSERT INTO Tutores (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Cedula, Telefono, Direccion, FK_Parentesco, Correo_Electronico) VALUES 
    (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Cedula, Telefono, Direccion, FK_Parentesco, Correo_Electronico);
END//
DELIMITER ; 

-- CALL sp_create_tutor('', '', '', '', '', '', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Leer tutores
DELIMITER //
CREATE PROCEDURE sp_read_tutor()
BEGIN
    SELECT T.*,  Par.Parentesco
    FROM Tutores T    
    INNER JOIN Parentescos Par ON T.FK_Parentesco = Par.ID_Parentesco
    ORDER BY T.ID_Tutor;
END//
DELIMITER ; 

-- CALL sp_read_tutor();
-- ----------------------------------------------------------------------------------------------------------------------
-- Editar tutor
DELIMITER //
CREATE PROCEDURE sp_update_tutor(
IN ID INT,
Pri_Nombre VARCHAR(20),
Seg_Nombre VARCHAR(20),
Pri_Apellido VARCHAR(20),
Seg_Apellido VARCHAR(20),
Cedula VARCHAR(25),
Telefono INT,
Direccion VARCHAR(45) ,
FK_Parentesco INT ,
Correo_Electronico VARCHAR(255))
BEGIN
	SET sql_safe_updates = 0;
    UPDATE Tutores
    SET Pri_Nombre = Pri_Nombre, 
        Seg_Nombre = Seg_Nombre, 
        Pri_Apellido = Pri_Apellido, 
        Seg_Apellido = Seg_Apellido,       
        Cedula = Cedula, 
        Telefono = Telefono, 
        Direccion = Direccion, 
        FK_Parentesco = FK_Parentesco, 
        Correo_Electronico = Correo_Electronico
    WHERE ID = ID_Tutor;
END//
DELIMITER ; 

-- call sp_update_tutor('', '', '', '', '', '', '', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar tutor
DELIMITER //
CREATE PROCEDURE sp_delete_tutor(in ID int)
BEGIN
    DELETE FROM Tutores WHERE ID_Tutor = ID;
END//
DELIMITER ;  

-- CALL sp_delete_tutor('16');
-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

-- Crear un nuevo estudiante
DELIMITER //
CREATE PROCEDURE sp_create_student(
IN Pri_Nombre VARCHAR(20), 
Seg_Nombre VARCHAR(20), 
Pri_Apellido VARCHAR(20), 
Seg_Apellido VARCHAR(20), 
Fecha_Nacimiento DATE, 
Cedula VARCHAR(25), 
FK_Genero INT, 
Telefono INT, 
Direccion VARCHAR(45), 
Correo_Electronico VARCHAR(45), 
FK_Tutor INT)
BEGIN
    INSERT INTO Estudiantes (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Fecha_Nacimiento, Cedula, FK_Genero, Telefono, Direccion, Correo_Electronico, FK_Tutor) VALUES 
    (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Fecha_Nacimiento, Cedula, FK_Genero, Telefono, Direccion, Correo_Electronico, FK_Tutor);
END//
DELIMITER ; 

-- CALL sp_create_student('', '', '', '', '', '', '', '', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Leer la estudiantes
DELIMITER //
CREATE PROCEDURE sp_read_student()
BEGIN
    SELECT E.*, CONCAT(Tut.Pri_Nombre, ' ', Tut.Pri_Apellido) AS Tutor, Gen.Genero
    FROM Estudiantes E
    INNER JOIN Tutores Tut ON E.FK_Tutor = Tut.ID_Tutor
    INNER JOIN Generos Gen ON E.FK_Genero = Gen.ID_Genero
    ORDER BY E.ID_Estudiante;
END//
DELIMITER ; 

-- CALL sp_read_student();
-- ----------------------------------------------------------------------------------------------------------------------
-- Editar estudiante
DELIMITER //
CREATE PROCEDURE sp_update_student(
IN ID INT,
Pri_Nombre VARCHAR(20), 
Seg_Nombre VARCHAR(20), 
Pri_Apellido VARCHAR(20), 
Seg_Apellido VARCHAR(20), 
Fecha_Nacimiento DATE, 
Cedula VARCHAR(25), 
FK_Genero INT, 
Telefono INT, 
Direccion VARCHAR(45), 
Correo_Electronico VARCHAR(45), 
FK_Tutor INT)
BEGIN
	SET sql_safe_updates = 0;
    UPDATE Estudiantes 
    SET Pri_Nombre = Pri_Nombre, 
        Seg_Nombre = Seg_Nombre, 
        Pri_Apellido = Pri_Apellido, 
        Seg_Apellido = Seg_Apellido, 
        Fecha_Nacimiento = Fecha_Nacimiento, 
        Cedula = Cedula, 
        FK_Genero = FK_Genero, 
        Telefono = Telefono, 
        Direccion = Direccion, 
        Correo_Electronico = Correo_Electronico, 
        FK_Tutor = FK_Tutor
    WHERE ID = ID_Estudiante;
END//
DELIMITER ; 

-- CALL sp_update_student('', '', '', '', '', '', '', '', '', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar estudiante
DELIMITER //
CREATE PROCEDURE sp_delete_student(in ID int)
BEGIN
    DELETE FROM Estudiantes WHERE ID_Estudiante = ID;
END//
DELIMITER ;  

-- CALL sp_delete_student('');

-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- Crear un nuevo periodo escolar
DELIMITER //
CREATE PROCEDURE sp_create_school_period(IN Anio INT, Fecha_Inicio DATE, Fecha_Final DATE, Estado VARCHAR(45))
BEGIN
    INSERT INTO anio_lectivo (Anio, Fecha_Inicio, Fecha_final, Estado) VALUES 
    (Anio, Fecha_Inicio, Fecha_final, Estado);
END//
DELIMITER ; 

-- CALL sp_create_school_period('', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Leer la tabla periodo escolar
DELIMITER //
CREATE PROCEDURE sp_read_school_period()
BEGIN
    SELECT * FROM anio_lectivo;
END//
DELIMITER ; 

-- CALL sp_read_school_period();
-- ----------------------------------------------------------------------------------------------------------------------
-- Editar periodo escolar
DELIMITER //
CREATE PROCEDURE sp_update_school_period(IN ID_Anio INT, Anio INT, Fecha_Inicio DATE, Fecha_Final DATE, Estado VARCHAR(45))
BEGIN
	SET sql_safe_updates = 0;
    UPDATE anio_lectivo SET Anio = Anio, Fecha_Inicio = Fecha_Inicio, Fecha_Final = Fecha_Final, Estado = Estado 
    WHERE ID_Anio = ID_Anio_Lectivo;
END//
DELIMITER ; 

-- CALL sp_update_school_period('', '', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar periodo escolar
DELIMITER //
CREATE PROCEDURE sp_delete_school_period(in id int)
BEGIN
    DELETE FROM anio_lectivo WHERE ID_Anio_Lectivo = id;
END//
DELIMITER ;  

-- CALL sp_delete_school_period('');

-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- Crear calificacion 
DELIMITER //
CREATE PROCEDURE sp_create_qualification(
IN FK_Estudiante INT,
FK_Asignatura INT,
Nota INT,
FK_Anio_Lectivo INT)
BEGIN
    INSERT INTO Calificaciones (FK_Estudiante, FK_Asignatura, Nota, FK_Anio_Lectivo) VALUES 
    (FK_Estudiante, FK_Asignatura, Nota, FK_Anio_Lectivo);
END//
DELIMITER ; 

-- CALL sp_create_qualification('', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Leer calificacion
DELIMITER //
CREATE PROCEDURE sp_read_qualification()
BEGIN
    SELECT 
		c.*, p.Anio,
		concat(e.Pri_Nombre, " ", e.Pri_Apellido) AS Nombre_Estudiante, a.Asignatura AS Asignatura
	FROM 
		Calificaciones c
	JOIN 
		Estudiantes e ON c.FK_Estudiante = e.ID_Estudiante
	JOIN 
		Asignaturas a ON c.FK_Asignatura = a.ID_Asignatura
	JOIN 
		Anio_Lectivo p ON c.FK_Anio_Lectivo = p.ID_Anio_Lectivo
	ORDER BY 
		c.FK_Estudiante, a.Asignatura;
END//
DELIMITER ; 

-- CALL sp_read_qualification();
-- ----------------------------------------------------------------------------------------------------------------------
-- Editar calificacion
DELIMITER //
CREATE PROCEDURE sp_update_qualification(
IN ID INT,
FK_Estudiante INT,
FK_Asignatura INT,
Nota INT,
FK_Anio_Lectivo INT)
BEGIN
	SET sql_safe_updates = 0;
    UPDATE Calificaciones SET FK_Estudiante = FK_Estudiante, FK_Asignatura = FK_Asignatura, Nota = Nota, FK_Anio_Lectivo = FK_Anio_Lectivo
    WHERE ID = ID_Calificacion;
END//
DELIMITER ; 

-- CALL sp_update_qualification('', '', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar periodo escolar
DELIMITER //
CREATE PROCEDURE sp_delete_qualification(IN ID INT)
BEGIN
    DELETE FROM Calificaciones WHERE ID_Calificacion = ID;
END//
DELIMITER ;  

-- CALL sp_delete_qualification('30');

-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-- Crear un nuevo usuario
DELIMITER //
CREATE PROCEDURE sp_create_user(
IN FK_Tipo_User INT,
Usuario VARCHAR(20),
Contrasena INT,
Pri_Nombre VARCHAR(20),
Seg_Nombre VARCHAR(20),
Pri_Apellido VARCHAR(20),
Seg_Apellido VARCHAR(20),
Telefono INT,
Correo_Electronico VARCHAR(45),
imagen varchar(250))
BEGIN
    INSERT INTO USERS (FK_Tipo_User, Usuario, Contrasena, Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Telefono, Correo_Electronico) VALUES 
    (FK_Tipo_User, Usuario, Contrasena, Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Telefono, Correo_Electronico);
END//
DELIMITER ; 

-- CALL sp_create_user('', '', '', '', '', '', '', '', '', '',);
-- ----------------------------------------------------------------------------------------------------------------------
-- Leer la tabla users
DELIMITER //
CREATE PROCEDURE sp_read_user()
BEGIN
    SELECT U.*, T.Tipo AS Permisos
	FROM USERS U
	JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo;
END//
DELIMITER ; 

-- CALL sp_read_user();
-- ----------------------------------------------------------------------------------------------------------------------
-- Editar user
DELIMITER //
CREATE PROCEDURE sp_update_user(
IN ID INT,
FK_Tipo_User INT,
Usuario VARCHAR(20),
Contrasena INT,
Pri_Nombre VARCHAR(20),
Seg_Nombre VARCHAR(20),
Pri_Apellido VARCHAR(20),
Seg_Apellido VARCHAR(20),
Telefono INT,
Correo_Electronico VARCHAR(45),
imagen varchar(250))
BEGIN
	SET sql_safe_updates = 0;
    UPDATE users SET 
    FK_Tipo_User = FK_Tipo_User, 
    Usuario = Usuario, 
    Contrasena = Contrasena, 
    Pri_Nombre = Pri_Nombre,
    Seg_Nombre = Seg_Nombre,
    Pri_Apellido = Pri_Apellido,
    Seg_Apellido = Seg_Apellido,
    Telefono = Telefono,
    Correo_Electronico = Correo_Electronico,
    imagen = imagen
    WHERE ID = ID_USER;
END//
DELIMITER ; 

-- CALL sp_update_user('', '', '', '', '', '', '', '', '', '' , '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar usuario
DELIMITER //
CREATE PROCEDURE sp_delete_user(in ID int)
BEGIN
    DELETE FROM users WHERE ID = ID_USER;
END//
DELIMITER ;  

-- CALL sp_delete_user('');