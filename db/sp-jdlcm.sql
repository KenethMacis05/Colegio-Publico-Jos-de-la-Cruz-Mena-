-- Procedimientos almacenados
USE gestion_escolar_jdlcm;
-- ----------------------------------------------------------------------------------------------------------------------
-- Crear un nuevo periodo escolar
DELIMITER //
CREATE PROCEDURE sp_create_school_period(IN Anio INT, Fecha_Inicio DATE, Fecha_Final DATE, Estado VARCHAR(45))
BEGIN
    INSERT INTO anio_lectivo (Anio, Fecha_Inicio, Fecha_final, Estado) VALUES 
    (Anio, Fecha_Inicio, Fecha_final, Estado);
END//
DELIMITER ; 

-- CALL sp_new_school_period('', '', '', '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Leer la tabla periodo escolar
DELIMITER //
CREATE PROCEDURE sp_read_school_period()
BEGIN
    SELECT * FROM anio_lectivo;
END//
DELIMITER ; 

-- CALL sp_school_period();
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
-- ----------------------------------------------------------------------------------------------------------------------

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

-- CALL sp_new_user('', '', '', '', '', '', '', '', '', '',);
-- ----------------------------------------------------------------------------------------------------------------------
-- Leer la tabla users
DELIMITER //
CREATE PROCEDURE sp_read_user()
BEGIN
    SELECT * FROM USERS;
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

-- CALL sp_new_user('', '', '', '', '', '', '', '', '', '' , '');
-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar usuario
DELIMITER //
CREATE PROCEDURE sp_delete_user(in ID int)
BEGIN
    DELETE FROM users WHERE ID = ID_USER;
END//
DELIMITER ;  

-- CALL sp_delete_user('');