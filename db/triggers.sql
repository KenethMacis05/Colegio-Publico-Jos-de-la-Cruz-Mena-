-- Trigger de la tabla BitacoraUsuarios
CREATE TABLE BitacoraUsuarios (
    ID_BitacoraU INT PRIMARY KEY AUTO_INCREMENT,
    Usuario VARCHAR(16),
    Accion VARCHAR(10),
    Descripcion VARCHAR(45),
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trigger create usuario
DELIMITER //
CREATE TRIGGER trigger_user_create AFTER INSERT ON users
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraUsuarios (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'CREATE', CONCAT('Se creó el usuario: ', NEW.Usuario), NOW());
END; //
DELIMITER ;

-- Trigger update usuario
DELIMITER //
CREATE TRIGGER trigger_user_update AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraUsuarios (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'UPDATE', CONCAT('Se actualizo el usuario: ', OLD.Usuario), NOW());
END; //
DELIMITER ;

-- Trigger delete usuario
DELIMITER //
CREATE TRIGGER trigger_user_delete AFTER DELETE ON users
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraUsuarios (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'DELETE', CONCAT('Se elimino el usuario: ', OLD.Usuario), NOW());
END; //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------------
-- Trigger de la tabla BitacoraTutores
CREATE TABLE BitacoraTutores (
    ID_BitacoraT INT PRIMARY KEY AUTO_INCREMENT,
    Usuario VARCHAR(16),
    Accion VARCHAR(10),
    Descripcion VARCHAR(80),
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trigger create tutor
DELIMITER //
CREATE TRIGGER trigger_tutor_create AFTER INSERT ON Tutores
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraTutores (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'CREATE', CONCAT('Se creó el tutor: ', NEW.Pri_Nombre, ' ', NEW.Seg_Nombre, ' ', NEW.Pri_Apellido, ' ', NEW.Seg_Apellido), NOW());
END; //
DELIMITER ;

-- Trigger update tutor
DELIMITER //
CREATE TRIGGER trigger_tutor_update AFTER UPDATE ON Tutores
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraTutores (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'UPDATE', CONCAT('Se actualizó el tutor: ', OLD.Pri_Nombre, ' ', OLD.Seg_Nombre, ' ', OLD.Pri_Apellido, ' ', OLD.Seg_Apellido), NOW());
END; //
DELIMITER ;

-- Trigger delete tutor
DELIMITER //
CREATE TRIGGER trigger_tutor_delete AFTER DELETE ON Tutores
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraTutores (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'DELETE', CONCAT('Se eliminó el tutor: ', OLD.Pri_Nombre, ' ', OLD.Seg_Nombre, ' ', OLD.Pri_Apellido, ' ', OLD.Seg_Apellido), NOW());
END; //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------------
-- Trigger de la tabla BitacoraEstudiantes
CREATE TABLE BitacoraEstudiantes (
    ID_BitacoraE INT PRIMARY KEY AUTO_INCREMENT,
    Usuario VARCHAR(16),
    Accion VARCHAR(10),
    Descripcion VARCHAR(80),
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trigger create estudiante
DELIMITER //
CREATE TRIGGER trigger_estudiante_create AFTER INSERT ON Estudiantes
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraEstudiantes (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'CREATE', CONCAT('Se creó el estudiante: ', NEW.Pri_Nombre, ' ', NEW.Seg_Nombre, ' ', NEW.Pri_Apellido, ' ', NEW.Seg_Apellido), NOW());
END; //
DELIMITER ;

-- Trigger update estudiante
DELIMITER //
CREATE TRIGGER trigger_estudiante_update AFTER UPDATE ON Estudiantes
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraEstudiantes (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'UPDATE', CONCAT('Se actualizó el estudiante: ', OLD.Pri_Nombre, ' ', OLD.Seg_Nombre, ' ', OLD.Pri_Apellido, ' ', OLD.Seg_Apellido), NOW());
END; //
DELIMITER ;

-- Trigger delete estudiante
DELIMITER //
CREATE TRIGGER trigger_estudiante_delete AFTER DELETE ON Estudiantes
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraEstudiantes (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'DELETE', CONCAT('Se eliminó el estudiante: ', OLD.Pri_Nombre, ' ', OLD.Seg_Nombre, ' ', OLD.Pri_Apellido, ' ', OLD.Seg_Apellido), NOW());
END; //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------------
-- Triggers de la tabla BitacoraPeriodoEscolar
CREATE TABLE BitacoraPeriodoEscolar (
    ID_BitacoraPE INT PRIMARY KEY AUTO_INCREMENT,
    Usuario VARCHAR(16),
    Accion VARCHAR(10),
    Descripcion VARCHAR(80),
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trigger create PeriodoEscolar
DELIMITER //
CREATE TRIGGER trigger_anio_lectivo_create AFTER INSERT ON Anio_Lectivo
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraPeriodoEscolar (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'CREATE', CONCAT('Se creó el año lectivo: ', NEW.Anio), NOW());
END; //
DELIMITER ;

-- Trigger update PeriodoEscolar
DELIMITER //
CREATE TRIGGER trigger_anio_lectivo_update AFTER UPDATE ON Anio_Lectivo
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraPeriodoEscolar (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'UPDATE', CONCAT('Se actualizó el año lectivo: ', OLD.Anio), NOW());
END; //
DELIMITER ;

-- Trigger delete PeriodoEscolar
DELIMITER //
CREATE TRIGGER trigger_anio_lectivo_delete AFTER DELETE ON Anio_Lectivo
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraPeriodoEscolar (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'DELETE', CONCAT('Se eliminó el año lectivo: ', OLD.Anio), NOW());
END; //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------------
-- Triggers para la tabla BitacoraCalificaciones
CREATE TABLE BitacoraCalificaciones (
    ID_BitacoraC INT PRIMARY KEY AUTO_INCREMENT,
    Usuario VARCHAR(16),
    Accion VARCHAR(10),
    Descripcion VARCHAR(80),
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trigger create Calificaciones
DELIMITER //
CREATE TRIGGER trigger_calificacion_create AFTER INSERT ON Calificaciones
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraCalificaciones (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'CREATE', CONCAT('Se crearon las calificaciones para el estudiante: ', NEW.FK_Estudiante), NOW());
END; //
DELIMITER ;

-- Trigger update Calificaciones
DELIMITER //
CREATE TRIGGER trigger_calificacion_update AFTER UPDATE ON Calificaciones
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraCalificaciones (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'UPDATE', CONCAT('Se actualizaron las calificaciones para el estudiante: ', OLD.FK_Estudiante), NOW());
END; //
DELIMITER ;

-- Trigger delete Calificaiones
DELIMITER //
CREATE TRIGGER trigger_calificacion_delete AFTER DELETE ON Calificaciones
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraCalificaciones (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'DELETE', CONCAT('Se eliminaron las calificaciones para el estudiante: ', OLD.FK_Estudiante), NOW());
END; //
DELIMITER ;

-- ----------------------------------------------------------------------------------------------------------------------
-- Triggers para la tabla BitacoraMatriculas
CREATE TABLE BitacoraMatriculas (
    ID_BitacoraM INT PRIMARY KEY AUTO_INCREMENT,
    Usuario VARCHAR(16),
    Accion VARCHAR(10),
    Descripcion VARCHAR(80),
    Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trigger create Matricula
DELIMITER //
CREATE TRIGGER trigger_matricula_create AFTER INSERT ON Matriculas
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraMatriculas (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'CREATE', CONCAT('Se matriculó al estudiante: ', NEW.FK_Estudiante, ' en el año lectivo: ', NEW.FK_Anio_Lectivo), NOW());
END; //
DELIMITER ;

-- Trigger update Matricula
DELIMITER //
CREATE TRIGGER trigger_matricula_update AFTER UPDATE ON Matriculas
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraMatriculas (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'UPDATE', CONCAT('Se actualizó la matrícula del estudiante: ', OLD.FK_Estudiante, ' en el año lectivo: ', OLD.FK_Anio_Lectivo), NOW());
END; //
DELIMITER ;

-- Trigger delete Matricula
DELIMITER //
CREATE TRIGGER trigger_matricula_delete AFTER DELETE ON Matriculas
FOR EACH ROW
BEGIN
    INSERT INTO BitacoraMatriculas (Usuario, Accion, Descripcion, Fecha)
    VALUES (CURRENT_USER(), 'DELETE', CONCAT('Se eliminó la matrícula del estudiante: ', OLD.FK_Estudiante, ' en el año lectivo: ', OLD.FK_Anio_Lectivo), NOW());
END; //
DELIMITER ;
