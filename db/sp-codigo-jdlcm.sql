-- Codigo de los Procedimientos almacenados
-- use gestion_escolar_jdlcm;
-- SP Tutores
-- CALL sp_create_tutor('', '', '', '', '', '', '', '');
-- CALL sp_read_tutor();
-- CALL sp_read_tutor_id('')
-- CALL sp_update_tutor('', '', '', '', '', '', '', '', '');
-- CALL sp_delete_tutor('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Estudiantes
-- CALL sp_create_student('', '', '', '', '', '', '', '', '', '', '', '');
-- CALL sp_read_student();
-- CALL sp_read_student_id('');
-- CALL sp_update_student('', '', '', '', '', '', '', '', '', '', '', '', '');
-- CALL sp_delete_student('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Periodo Escolar
-- CALL sp_create_school_period('', '', '', '');
-- CALL sp_read_school_period();
-- CALL sp_update_school_period('', '', '', '', '');
-- CALL sp_delete_school_period('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Calificaciones
-- CALL sp_create_calificaciones('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
-- CALL sp_read_calificaciones();
-- CALL sp_read_calificaciones_id('');
-- CALL sp_update_calificaciones('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
-- CALL sp_delete_calificaciones('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Matriculas
-- CALL sp_create_matricula('', '', '', '', '', '', '', '');
-- CALL sp_read_matricula();
-- CALL sp_read_matricula_estudiante('');
-- CALL sp_update_matricula('', '', '', '', '', '', '', '', '');
-- CALL sp_delete_matricula('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Usuarios
-- CALL sp_create_user('', '', '', '', '', '', '', '', '', '');
-- CALL sp_read_user();
-- CALL sp_update_user('', '', '', '', '', '', '', '', '', '', '');
-- CALL sp_delete_user('');

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
Correo_Electronico VARCHAR(255))
BEGIN
    INSERT INTO Tutores (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Cedula, Telefono, Direccion, Correo_Electronico) VALUES 
    (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Cedula, Telefono, Direccion, Correo_Electronico);
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Leer tutores
DELIMITER //
CREATE PROCEDURE sp_read_tutor()
BEGIN
    SELECT * FROM Tutores;
END//
DELIMITER ; 

DELIMITER //
CREATE PROCEDURE sp_read_tutor_id(IN ID INT)
BEGIN
	SELECT T.*, E.ID_Estudiante, E.Pri_Nombre AS priNombreEstu, E.Seg_Nombre AS segNombreEstu, E.Pri_Apellido AS priApellidoEstu, E.Seg_Apellido AS segApellidoEstu
    FROM Tutores T
    INNER JOIN Estudiantes E ON E.FK_Tutor = T.ID_Tutor
WHERE ID_Tutor = ID;
END//
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------------
-- Editar tutor
DELIMITER //
CREATE PROCEDURE sp_update_tutor(IN ID INT, Pri_Nombre VARCHAR(20), Seg_Nombre VARCHAR(20), Pri_Apellido VARCHAR(20), Seg_Apellido VARCHAR(20), Cedula VARCHAR(25), Telefono INT, Direccion VARCHAR(45), Correo_Electronico VARCHAR(255))
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
        Correo_Electronico = Correo_Electronico
    WHERE ID = ID_Tutor;
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar tutor
DELIMITER //
CREATE PROCEDURE sp_delete_tutor(in ID int)
BEGIN
    DELETE FROM Tutores WHERE ID_Tutor = ID;
END//
DELIMITER ;  

-- ----------------------------------------------------------------------------------------------------------------------
-- Crear estudiante
DELIMITER //
CREATE PROCEDURE sp_create_student(IN Pri_Nombre VARCHAR(20), Seg_Nombre VARCHAR(20), Pri_Apellido VARCHAR(20), Seg_Apellido VARCHAR(20), Fecha_Nacimiento DATE, Cedula VARCHAR(25), FK_Genero INT, Telefono INT, Direccion VARCHAR(45), Correo_Electronico VARCHAR(45), FK_Tutor INT,FK_Parentesco INT)
BEGIN
    INSERT INTO Estudiantes (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Fecha_Nacimiento, Cedula, FK_Genero, Telefono, Direccion, Correo_Electronico, FK_Tutor, FK_Parentesco) VALUES 
    (Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Fecha_Nacimiento, Cedula, FK_Genero, Telefono, Direccion, Correo_Electronico, FK_Tutor, FK_Parentesco);
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Leer estudiante
DELIMITER //
CREATE PROCEDURE sp_read_student()
BEGIN
    SELECT E.*, G.Genero, CONCAT(T.Pri_Nombre, ' ', T.Pri_Apellido) AS Tutor, P.Parentesco
    FROM Estudiantes E
    INNER JOIN Tutores T ON E.FK_Tutor = T.ID_Tutor
    INNER JOIN Generos G ON E.FK_Genero = G.ID_Genero
    INNER JOIN Parentescos P ON E.FK_Parentesco = P.ID_Parentesco
    ORDER BY E.ID_Estudiante;
END//
DELIMITER ; 

DELIMITER //
CREATE PROCEDURE sp_read_student_id(IN ID INT)
BEGIN
    SELECT E.*, G.Genero, M.Cod_Matricula, Gr.Grado, Sec.Seccion, Tur.Turno, A.Anio, T.Pri_Nombre AS priNombreTutor, T.Seg_Nombre AS segNombreTutor,  T.Pri_Apellido AS priApellidoTutor, T.Seg_Apellido AS segApellidoTutor, P.Parentesco
    FROM Estudiantes E
    INNER JOIN Tutores T ON E.FK_Tutor = T.ID_Tutor
    INNER JOIN Generos G ON E.FK_Genero = G.ID_Genero
    INNER JOIN Parentescos P ON E.FK_Parentesco = P.ID_Parentesco
    INNER JOIN Matriculas M ON M.FK_Estudiante = E.ID_Estudiante
    INNER JOIN Grados Gr ON M.FK_Grado = Gr.ID_Grado
	INNER JOIN Secciones Sec ON M.FK_Seccion = Sec.ID_Seccion
	INNER JOIN Turnos Tur ON M.FK_Turno = Tur.ID_Turno
    INNER JOIN Anio_Lectivo A ON M.FK_Anio_Lectivo = A.ID_Anio_Lectivo
WHERE E.ID_Estudiante = ID
ORDER BY E.ID_Estudiante;
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Editar estudiante
DELIMITER //
CREATE PROCEDURE sp_update_student(IN ID INT, Pri_Nombre VARCHAR(20), Seg_Nombre VARCHAR(20), Pri_Apellido VARCHAR(20), Seg_Apellido VARCHAR(20), Fecha_Nacimiento DATE, Cedula VARCHAR(25), FK_Genero INT, Telefono INT, Direccion VARCHAR(45), Correo_Electronico VARCHAR(45), FK_Tutor INT,FK_Parentesco INT)
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
        FK_Tutor = FK_Tutor,
        FK_Parentesco = FK_Parentesco
    WHERE ID = ID_Estudiante;
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar estudiante
DELIMITER //
CREATE PROCEDURE sp_delete_student(in ID int)
BEGIN
    DELETE FROM Estudiantes WHERE ID_Estudiante = ID;
END//
DELIMITER ;  

-- ----------------------------------------------------------------------------------------------------------------------
-- Crear periodo escolar
DELIMITER //
CREATE PROCEDURE sp_create_school_period(IN Anio INT, Fecha_Inicio DATE, Fecha_Final DATE, Estado VARCHAR(45))
BEGIN
    INSERT INTO anio_lectivo (Anio, Fecha_Inicio, Fecha_final, Estado) VALUES 
    (Anio, Fecha_Inicio, Fecha_final, Estado);
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Leer periodo escolar
DELIMITER //
CREATE PROCEDURE sp_read_school_period()
BEGIN
    SELECT * FROM anio_lectivo;
END//
DELIMITER ; 

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

-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar periodo escolar
DELIMITER //
CREATE PROCEDURE sp_delete_school_period(in id int)
BEGIN
    DELETE FROM anio_lectivo WHERE ID_Anio_Lectivo = id;
END//
DELIMITER ;  

-- ----------------------------------------------------------------------------------------------------------------------
-- Crear calificacion 
DELIMITER //
CREATE PROCEDURE sp_create_calificaciones(
IN FK_Estudiante INT, Matematica INT, Lengua_Extranjera INT, Lengua_Literatura INT, Ciencias_Naturales INT, Educacion_Fisica INT, Quimica INT, OTV INT, Fisica INT, Biologia INT, Historia INT, Geografia INT, Economia INT, Sociologia INT, ECA INT,FK_Anio_Lectivo INT, FK_Grado INT)
BEGIN
    INSERT INTO Calificaciones (FK_Estudiante, Matematica, Lengua_Extranjera, Lengua_Literatura, Ciencias_Naturales, Educacion_Fisica, Quimica, OTV, Fisica, Biologia, Historia, Geografia, Economia, Sociologia, ECA, FK_Anio_Lectivo, FK_Grado) VALUES 
    (FK_Estudiante, Matematica, Lengua_Extranjera, Lengua_Literatura, Ciencias_Naturales, Educacion_Fisica, Quimica, OTV, Fisica, Biologia, Historia, Geografia, Economia, Sociologia, ECA, FK_Anio_Lectivo, FK_Grado);
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Leer calificacion
DELIMITER //
CREATE PROCEDURE sp_read_calificaciones()
BEGIN
    SELECT CONCAT(E.Pri_Nombre, " ", E.Pri_Apellido) AS Estudiante, E.Cedula, E.Telefono, G.Grado, C.*, AL.Anio AS Anio_Lectivo
	FROM Calificaciones C
	JOIN Estudiantes E ON C.FK_Estudiante = E.ID_Estudiante
	JOIN Anio_Lectivo AL ON C.FK_Anio_Lectivo = AL.ID_Anio_Lectivo
    JOIN Grados G ON C.FK_Grado = G.ID_Grado
    ORDER BY ID_Calificacion;
END//
DELIMITER ; 

-- Leer calificación por ID
DELIMITER //
CREATE PROCEDURE sp_read_calificaciones_id(IN ID INT)
BEGIN
    SELECT CONCAT(E.Pri_Nombre, " ", E.Pri_Apellido) AS Estudiante, E.Cedula, E.Telefono, G.Grado, C.*, AL.Anio AS Anio_Lectivo
	FROM Calificaciones C
	JOIN Estudiantes E ON C.FK_Estudiante = E.ID_Estudiante
	JOIN Anio_Lectivo AL ON C.FK_Anio_Lectivo = AL.ID_Anio_Lectivo
    JOIN Grados G ON C.FK_Grado = G.ID_Grado
    WHERE C.ID_Calificacion = ID;
END//
DELIMITER ;
-- ----------------------------------------------------------------------------------------------------------------------
-- Editar calificacion
DELIMITER //
CREATE PROCEDURE sp_update_calificaciones(IN ID INT, FK_Estudiante INT, Matematica INT, Lengua_Extranjera INT, Lengua_Literatura INT, Ciencias_Naturales INT, Educacion_Fisica INT, Quimica INT, OTV INT, Fisica INT, Biologia INT, Historia INT, Geografia INT, Economia INT, Sociologia INT, ECA INT, FK_Anio_Lectivo INT, FK_Grado INT)
BEGIN
	SET sql_safe_updates = 0;
    UPDATE Calificaciones SET FK_Estudiante = FK_Estudiante, 
		Matematica = Matematica,
        Lengua_Extranjera = Lengua_Extranjera,
        Lengua_Literatura = Lengua_Literatura,
        Ciencias_Naturales = Ciencias_Naturales,
        Educacion_Fisica = Educacion_Fisica,
        Quimica = Quimica,
        OTV = OTV,
        Fisica = Fisica,
        Biologia = Biologia,
        Historia = Historia,
        Geografia = Geografia,
        Economia = Economia,
        Sociologia = Sociologia,
        ECA = ECA,
        FK_Anio_Lectivo = FK_Anio_Lectivo,
        FK_Grado = FK_Grado
    WHERE ID = ID_Calificacion;
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar calificacion
DELIMITER //
CREATE PROCEDURE sp_delete_calificaciones(IN ID INT)
BEGIN
    DELETE FROM Calificaciones WHERE ID_Calificacion = ID;
END//
DELIMITER ;  

-- ----------------------------------------------------------------------------------------------------------------------
-- Crear Matricula
DELIMITER //
CREATE PROCEDURE sp_create_matricula(
IN Cod_Matricula VARCHAR(45), FK_Estudiante INT, FK_Grado INT, FK_Seccion INT, FK_Turno INT, FK_Estado INT, FK_Anio_Lectivo INT, Fecha_Matricula DATE)
BEGIN 
	INSERT INTO Matriculas (Cod_Matricula, FK_Estudiante, FK_Grado, FK_Seccion, FK_Turno, FK_Estado, FK_Anio_Lectivo, Fecha_Matricula)
    VALUES (Cod_Matricula, FK_Estudiante, FK_Grado, FK_Seccion, FK_Turno, FK_Estado, FK_Anio_Lectivo, Fecha_Matricula);
END//
DELIMITER

-- ----------------------------------------------------------------------------------------------------------------------
-- Leer Matriculas
DELIMITER //
CREATE PROCEDURE sp_read_matricula()
BEGIN
	SELECT 
    M.*,
    E.Pri_Nombre, 
    E.Seg_Nombre, 
    E.Pri_Apellido, 
    E.Seg_Apellido, 
    E.Telefono, 
    Gr.Grado, 
    Sec.Seccion, 
    T.Turno, 
    Est.Estado, 
    E.Direccion, 
    A.Anio, 
    Tut.Pri_Nombre AS Tutor_Pri_Nombre, 
    Tut.Seg_Nombre AS Tutor_Seg_Nombre, 
    Tut.Pri_Apellido AS Tutor_Pri_Apellido, 
    Tut.Seg_Apellido AS Tutor_Seg_Apellido,
    Tut.Cedula AS Tutor_Cedula
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
		Grados Gr ON M.FK_Grado = Gr.ID_Grado
	INNER JOIN 
		Secciones Sec ON M.FK_Seccion = Sec.ID_Seccion
	INNER JOIN 
		Tutores Tut ON E.FK_Tutor = Tut.ID_Tutor
	ORDER BY M.ID_Matricula;
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Leer Matriculas por ID de la matricula
DELIMITER //
CREATE PROCEDURE sp_read_matricula_id(IN ID INT)
BEGIN
	SELECT 
    M.*,
    E.*,
    Tut.*,
    E.Pri_Nombre, 
    E.Seg_Nombre, 
    E.Pri_Apellido, 
    E.Seg_Apellido, 
    E.Telefono, 
    Gen.Genero,
    Gr.Grado, 
    Sec.Seccion, 
    T.Turno, 
    Est.Estado, 
    E.Direccion, 
    A.Anio, 
    Tut.Pri_Nombre AS Tutor_Pri_Nombre, 
    Tut.Seg_Nombre AS Tutor_Seg_Nombre, 
    Tut.Pri_Apellido AS Tutor_Pri_Apellido, 
    Tut.Seg_Apellido AS Tutor_Seg_Apellido,
    Tut.Cedula AS Tutor_Cedula,
    Tut.Telefono AS Tutor_Telefono,
    Tut.Direccion AS Tutor_Direccion,
    Tut.Correo_Electronico AS Tutor_Correo,
    Paren.Parentesco
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
		Grados Gr ON M.FK_Grado = Gr.ID_Grado
	INNER JOIN 
		Secciones Sec ON M.FK_Seccion = Sec.ID_Seccion
	INNER JOIN 
		Tutores Tut ON E.FK_Tutor = Tut.ID_Tutor
	INNER JOIN 
		Generos Gen ON Gen.ID_Genero = E.ID_Estudiante
	INNER JOIN 
		Parentescos Paren ON Paren.ID_Parentesco = E.ID_Estudiante
	WHERE M.ID_Matricula = ID
	ORDER BY M.ID_Matricula;
END//
DELIMITER ; 

-- Leer Matriculas por grado y añio de la matricula
DELIMITER //
CREATE PROCEDURE sp_read_matricula_grado_anio(IN Grado INT, Anio INT)
BEGIN
	SELECT 
		M.*, 
		E.*,
        Tut.*,
        E.Pri_Nombre, 
		E.Seg_Nombre, 
		E.Pri_Apellido, 
		E.Seg_Apellido, 
		E.Telefono, 
        Gen.Genero, 
        Gr.Grado,
        Sec.Seccion, 
        T.Turno, 
		Est.Estado, 
        E.Direccion, 
		A.Anio,
        Tut.Pri_Nombre AS Tutor_Pri_Nombre, 
		Tut.Seg_Nombre AS Tutor_Seg_Nombre, 
		Tut.Pri_Apellido AS Tutor_Pri_Apellido, 
		Tut.Seg_Apellido AS Tutor_Seg_Apellido,
		Tut.Cedula AS Tutor_Cedula,
		Tut.Telefono AS Tutor_Telefono,
		Tut.Direccion AS Tutor_Direccion,
		Tut.Correo_Electronico AS Tutor_Correo,
		Paren.Parentesco
    FROM 
		Matriculas M
	INNER JOIN 
		Estudiantes E ON M.FK_Estudiante = E.ID_Estudiante
	LEFT JOIN 
        Generos Gen ON E.FK_Genero = Gen.ID_Genero
	INNER JOIN 
		Grados Gr ON M.FK_Grado = Gr.ID_Grado
	INNER JOIN 
		Secciones Sec ON M.FK_Seccion = Sec.ID_Seccion
	INNER JOIN 
		Turnos T ON M.FK_Turno = T.ID_Turno
	INNER JOIN 
		Estados Est ON M.FK_Estado = Est.ID_Estado
	INNER JOIN 
		Anio_Lectivo A ON M.FK_Anio_Lectivo = A.ID_Anio_Lectivo
	INNER JOIN 
		Tutores Tut ON E.FK_Tutor = Tut.ID_Tutor
	LEFT JOIN 
        Parentescos Paren ON E.FK_Parentesco = Paren.ID_Parentesco
    WHERE 
		M.FK_Grado = Grado AND M.FK_Anio_Lectivo = AnioLectivo
    ORDER BY C.ID_Calificacion;
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Editar Matricula
DELIMITER //
CREATE PROCEDURE sp_update_matricula(
IN ID INT, Cod_Matricula VARCHAR(45), FK_Estudiante INT, FK_Grado INT, FK_Seccion INT, FK_Turno INT, FK_Estado INT, FK_Anio_Lectivo INT, Fecha_Matricula DATE)
BEGIN
	SET sql_safe_updates = 0;
    UPDATE Matriculas SET 
    Cod_Matricula = Cod_Matricula,
    FK_Estudiante = FK_Estudiante,
    FK_Grado = FK_Grado,
    FK_Seccion = FK_Seccion,
    FK_Turno = FK_Turno,
    FK_Estado = FK_Estado,
    FK_Anio_Lectivo = FK_Anio_Lectivo,
    Fecha_Matricula = Fecha_Matricula
    WHERE ID = ID_Matricula;
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar Matricula
DELIMITER //
CREATE PROCEDURE sp_delete_matricula(in ID int)
BEGIN
    DELETE FROM Matriculas WHERE ID = ID_Matricula;
END//
DELIMITER ;  

-- ----------------------------------------------------------------------------------------------------------------------
-- Crear usuario
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
Imagen longblob)
BEGIN
    INSERT INTO USERS (FK_Tipo_User, Usuario, Contrasena, Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Telefono, Correo_Electronico, Imagen) VALUES 
    (FK_Tipo_User, Usuario, Contrasena, Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Telefono, Correo_Electronico, Imagen);
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Leer usuarios
DELIMITER //
CREATE PROCEDURE sp_read_user()
BEGIN
    SELECT U.*, T.Tipo AS Permisos
	FROM USERS U
	JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo;
END//
DELIMITER ; 

-- Leer usuarios por id
DELIMITER //
CREATE PROCEDURE sp_read_user_id(IN ID INT)
BEGIN
    SELECT U.*, T.Tipo AS Permisos
	FROM USERS U
	JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo
    WHERE U.ID_User = ID;
END//
DELIMITER ; 

-- Login
DELIMITER //
CREATE PROCEDURE sp_login_user(IN usuario VARCHAR(20), contrasena INT)
BEGIN
    SELECT U.*, T.Tipo AS Permisos
	FROM USERS U
	JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo
    WHERE usuario = usuario AND contrasena = contrasena;
END//
DELIMITER ; 

-- ----------------------------------------------------------------------------------------------------------------------
-- Editar imagen de usuario
DELIMITER //
CREATE PROCEDURE sp_update_user_img(IN ID INT, Imagen longblob)
BEGIN
	SET sql_safe_updates = 0;
    UPDATE users SET     
		Imagen = Imagen
    WHERE ID = ID_USER;
END//
DELIMITER ; 
-- ----------------------------------------------------------------------------------------------------------------------
-- Editar usuario
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
Imagen longblob)
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
    Imagen = Imagen
    WHERE ID = ID_USER;
END//
DELIMITER ; 
-- ----------------------------------------------------------------------------------------------------------------------
-- Editar usuario sin imagen
DELIMITER //
CREATE PROCEDURE sp_update_user_sin_img(
IN ID INT,
FK_Tipo_User INT,
Usuario VARCHAR(20),
Contrasena INT,
Pri_Nombre VARCHAR(20),
Seg_Nombre VARCHAR(20),
Pri_Apellido VARCHAR(20),
Seg_Apellido VARCHAR(20),
Telefono INT,
Correo_Electronico VARCHAR(45))
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
    Correo_Electronico = Correo_Electronico    
    WHERE ID = ID_USER;
END//
DELIMITER ; 
-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar usuario
DELIMITER //
CREATE PROCEDURE sp_delete_user(in ID int)
BEGIN
    DELETE FROM users WHERE ID = ID_USER;
END//
DELIMITER ;
-- ----------------------------------------------------------------------------------------------------------------------
-- Eliminar imagen de usuario
DELIMITER //
CREATE PROCEDURE sp_delete_user_img(in ID int)
BEGIN
    UPDATE users SET Imagen = '' WHERE ID = ID_USER;
END//
DELIMITER ;