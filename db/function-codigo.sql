-- Codigo de las funciones

-- 1) function_calcular_edad(ID)
-- SELECT function_calcular_edad(Fecha_Nacimiento) AS Edad FROM Estudiantes WHERE ID_Estudiante = '' OR Pri_Nombre = 'Juan';
-- SELECT function_calcular_edad2(0, 'Maria') AS Edad;
-- SELECT function_calcular_edad3(2, '', '') AS Edad;
-- ----------------------------------------------------------------------------------------------------------------------
-- 2) function_estudiante_grado(ID, Grado)
-- SELECT CASE WHEN function_estudiante_grado('1', '1ro') THEN 'El estudiante esta en el grado' ELSE 'No esta en este grado' END AS Mensaje;
-- SELECT CASE WHEN function_estudiante_grado2('1', '1ro', '2024') THEN 'El estudiante esta en el grado' ELSE 'No esta en este grado o año' END AS Mensaje;
-- ----------------------------------------------------------------------------------------------------------------------
-- 3) function_estudiante_inscrito(ID)
-- SELECT CASE WHEN function_estudiante_inscrito('1') THEN 'El estudiante está matriculado.' ELSE 'El estudiante NO está matriculado.' END AS Mensaje;
-- ----------------------------------------------------------------------------------------------------------------------
-- 4) function_estudiantes_grupo(Grado, Seccion)
-- SELECT function_estudiantes_grupo('1ro', 'A') AS Nombres_Estudiantes;
-- ----------------------------------------------------------------------------------------------------------------------
-- 5) function_estudiantes_inscritos
-- SELECT function_estudiantes_inscritos() AS Total_Estudiantes;
-- ----------------------------------------------------------------------------------------------------------------------
-- 6) function_obtener_nombre(ID)
-- SELECT function_obtener_nombre('2') AS Nombre_Completo;
-- ----------------------------------------------------------------------------------------------------------------------
-- 7) function_promedio_calificaciones(ID)
-- SELECT function_promedio_calificaciones('1') AS Promedio_Total;
-- ----------------------------------------------------------------------------------------------------------------------
-- 8) function_promedio_general
-- SELECT function_promedio_general() AS Promedio_General;

-- Calcular la edad
DELIMITER //
CREATE FUNCTION function_calcular_edad(fecha_nacimiento DATE)
RETURNS INT DETERMINISTIC
BEGIN
    DECLARE edad INT;
    SET edad = TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE());
    RETURN edad;
END//
DELIMITER ;

-- Calcular la edad por medio del ID
DELIMITER //
CREATE FUNCTION function_calcular_edad_id(ID INT)
RETURNS INT DETERMINISTIC
BEGIN
    DECLARE edad INT;
    SELECT TIMESTAMPDIFF(YEAR, Fecha_Nacimiento, CURDATE()) INTO edad
    FROM Estudiantes
    WHERE ID_Estudiante = ID;
    RETURN edad;
END//
DELIMITER ;

-- Calcular la edad por medio del ID o Nombre
DELIMITER //
CREATE FUNCTION function_calcular_edad2(ID INT, nombre VARCHAR(45))
RETURNS INT DETERMINISTIC
BEGIN
    DECLARE edad INT;
    SELECT TIMESTAMPDIFF(YEAR, Fecha_Nacimiento, CURDATE()) INTO edad
    FROM Estudiantes
    WHERE ID_Estudiante = ID OR Pri_Nombre = nombre;
    RETURN edad;
END//
DELIMITER ;

-- Calcular la edad por medio del ID, Nombre y Apellido
DELIMITER //
CREATE FUNCTION function_calcular_edad3(ID INT, nombre VARCHAR(45), apellido VARCHAR(45))
RETURNS INT DETERMINISTIC
BEGIN
    DECLARE edad INT;
    SELECT TIMESTAMPDIFF(YEAR, Fecha_Nacimiento, CURDATE()) INTO edad
    FROM Estudiantes
    WHERE ID_Estudiante = ID OR (Pri_Nombre = nombre AND Pri_Apellido = apellido);
    RETURN edad;
END//
DELIMITER ;

-- Función para verificar si un estudiante está en un grado específico
DELIMITER //
CREATE FUNCTION function_estudiante_grado(ID INT, grado VARCHAR(45))
RETURNS BOOLEAN DETERMINISTIC
READS SQL DATA
BEGIN
    DECLARE matriculado BOOLEAN;
    DECLARE grado_num INT;
    SELECT GR.ID_Grado INTO grado_num FROM Grados GR WHERE GR.Grado = grado;
    
    SELECT COUNT(*) > 0 INTO matriculado
    FROM Matriculas
    JOIN Grados ON Matriculas.FK_Grado = Grados.ID_Grado
    WHERE Matriculas.FK_Estudiante = ID AND Grados.ID_Grado = grado_num AND Matriculas.FK_Anio_Lectivo = (SELECT ID_Anio_Lectivo FROM Anio_Lectivo ORDER BY Anio DESC LIMIT 1);
    RETURN matriculado;
END//
DELIMITER ;

-- Función para verificar si un estudiante está en un grado específico y año
DELIMITER //
CREATE FUNCTION function_estudiante_grado2(ID INT, grado VARCHAR(45), anioo VARCHAR(45))
RETURNS BOOLEAN DETERMINISTIC
READS SQL DATA
BEGIN
    DECLARE matriculado BOOLEAN;
    DECLARE grado_num INT;
    SELECT GR.ID_Grado INTO grado_num FROM Grados GR WHERE GR.Grado = grado;
    
    SELECT COUNT(*) > 0 INTO matriculado
    FROM Matriculas
    JOIN Grados ON Matriculas.FK_Grado = Grados.ID_Grado
    WHERE Matriculas.FK_Estudiante = ID AND Grados.ID_Grado = grado_num AND Matriculas.FK_Anio_Lectivo = (SELECT ID_Anio_Lectivo FROM Anio_Lectivo  WHERE Anio = anioo ORDER BY Anio DESC LIMIT 1);
    RETURN matriculado;
END//
DELIMITER ;

-- Nombre del estudiante
DELIMITER //
CREATE FUNCTION function_obtener_nombre(ID INT)
RETURNS VARCHAR(100) DETERMINISTIC
READS SQL DATA
BEGIN
    DECLARE nombre_completo VARCHAR(100);
    SELECT CONCAT(Pri_Nombre, ' ', Seg_Nombre, ' ', Pri_Apellido, ' ', Seg_Apellido) INTO nombre_completo
    FROM Estudiantes
    WHERE ID_Estudiante = ID;
    RETURN nombre_completo;
END//
DELIMITER ;

-- Verifica que el estudiante este inscrito
DELIMITER //
CREATE FUNCTION function_estudiante_inscrito(ID INT)
RETURNS BOOLEAN DETERMINISTIC
BEGIN
    DECLARE inscrito BOOLEAN;
    SELECT COUNT(*) > 0 INTO inscrito
    FROM Matriculas
    WHERE FK_Estudiante = ID AND FK_Anio_Lectivo = (SELECT ID_Anio_Lectivo FROM Anio_Lectivo ORDER BY Anio DESC LIMIT 1);
    RETURN inscrito;
END//
DELIMITER ;

-- Promedio de calificaciones
DELIMITER //
CREATE FUNCTION function_promedio_calificaciones(ID INT)
RETURNS DECIMAL(5,2) DETERMINISTIC
READS SQL DATA
BEGIN
    DECLARE promedio DECIMAL(5,2);
    SELECT SUM(Matematica + Lengua_Extranjera + Lengua_Literatura + Ciencias_Naturales + Educacion_Fisica + Quimica + OTV + Fisica + Biologia + Historia + Geografia + Economia + Sociologia + ECA) / 14 INTO promedio
    FROM Calificaciones
    WHERE FK_Estudiante = ID;
    RETURN promedio;
END//
DELIMITER ;

-- Función para contar el número total de estudiantes inscritos
DELIMITER //
CREATE FUNCTION function_estudiantes_inscritos()
RETURNS INT DETERMINISTIC
READS SQL DATA
BEGIN
    DECLARE total_estudiantes INT;
    SELECT COUNT(DISTINCT FK_Estudiante) INTO total_estudiantes
    FROM Matriculas
    WHERE FK_Anio_Lectivo = (SELECT ID_Anio_Lectivo FROM Anio_Lectivo ORDER BY Anio DESC LIMIT 1);
    RETURN total_estudiantes;
END//
DELIMITER ;

-- Función para obtener el promedio de calificaciones de todos los estudiantes
DELIMITER //
CREATE FUNCTION function_promedio_general()
RETURNS DECIMAL(5,2) DETERMINISTIC
READS SQL DATA
BEGIN
    DECLARE promedio_general DECIMAL(5,2);
    SELECT AVG(Calificaciones.Matematica + Calificaciones.Lengua_Extranjera + Calificaciones.Lengua_Literatura + Calificaciones.Ciencias_Naturales + Calificaciones.Educacion_Fisica + Calificaciones.Quimica + Calificaciones.OTV + Calificaciones.Fisica + Calificaciones.Biologia + Calificaciones.Historia + Calificaciones.Geografia + Calificaciones.Economia + Calificaciones.Sociologia + Calificaciones.ECA) / 14 INTO promedio_general
    FROM Calificaciones
    JOIN Matriculas ON Calificaciones.FK_Estudiante = Matriculas.FK_Estudiante
    WHERE Matriculas.FK_Anio_Lectivo = (SELECT ID_Anio_Lectivo FROM Anio_Lectivo ORDER BY Anio DESC LIMIT 1);
    RETURN promedio_general;
END//
DELIMITER ;

DELIMITER //
CREATE FUNCTION function_estudiantes_grupo(grado VARCHAR(50), seccion VARCHAR(50))
RETURNS VARCHAR(5000) DETERMINISTIC
READS SQL DATA
BEGIN
	DECLARE grado_num INT;
    DECLARE seccion_num INT;
    DECLARE estudiante VARCHAR(5000);
    SELECT GR.ID_Grado INTO grado_num FROM Grados GR WHERE GR.Grado = grado;
    SELECT SEC.ID_Seccion INTO seccion_num FROM Secciones SEC WHERE SEC.Seccion = seccion;
    SELECT GROUP_CONCAT(E.Pri_Nombre SEPARATOR ', ') INTO estudiante
    FROM Estudiantes E
    INNER JOIN Matriculas M ON E.ID_Estudiante = M.FK_Estudiante
    INNER JOIN Grados GR ON M.FK_Grado = GR.ID_Grado
    INNER JOIN Secciones SEC ON M.FK_Seccion = SEC.ID_Seccion
    WHERE GR.ID_Grado = grado_num AND SEC.ID_Seccion = seccion_num;
    RETURN estudiante;
END//
DELIMITER ;
