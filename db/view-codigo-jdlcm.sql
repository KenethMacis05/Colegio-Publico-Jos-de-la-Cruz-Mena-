-- Vista tutores
CREATE VIEW view_tutores AS
SELECT ID_Tutor, CONCAT(Pri_Nombre, ' ', Seg_Nombre, ' ', Pri_Apellido, ' ', Seg_Apellido) AS Nombre_Tutor,
	Cedula,
    Telefono,
    Direccion,
    Correo_Electronico
FROM Tutores;
-- ----------------------------------------------------------------------------------------------------------------------

-- Vista estudiantes
CREATE VIEW view_estudiantes AS
SELECT E.ID_Estudiante, CONCAT(E.Pri_Nombre, ' ', E.Seg_Nombre, ' ', E.Pri_Apellido, ' ', E.Seg_Apellido) AS Nombre_estudiante, 
	E.Fecha_Nacimiento,
    E.Cedula,
	G.Genero, 
    E.Telefono,
    E.Direccion,
    E.Correo_Electronico,
    CONCAT(T.Pri_Nombre, ' ', T.Pri_Apellido) AS Tutor, 
    P.Parentesco
FROM Estudiantes E
INNER JOIN Tutores T ON E.FK_Tutor = T.ID_Tutor
INNER JOIN Generos G ON E.FK_Genero = G.ID_Genero
INNER JOIN Parentescos P ON E.FK_Parentesco = P.ID_Parentesco
ORDER BY E.ID_Estudiante;
-- ----------------------------------------------------------------------------------------------------------------------

-- Vista periodo escolar
CREATE VIEW view_periodo_escolar AS
SELECT * FROM anio_lectivo;
-- ----------------------------------------------------------------------------------------------------------------------

-- Vista calificaciones
CREATE OR REPLACE VIEW view_calificaciones AS
SELECT C.ID_Calificacion, CONCAT(E.Pri_Nombre, " ", E.Pri_Apellido) AS Estudiante, 
	C.Matematica, C.Lengua_Extranjera, C.Lengua_Literatura, C.Ciencias_Naturales, C.Educacion_Fisica, C.Quimica, C.OTV, C.Fisica, C.Biologia, C.Historia, C.Geografia, C.Economia, C.Sociologia, C.ECA, 
    AL.Anio AS Anio_Lectivo
FROM Calificaciones C
JOIN Estudiantes E ON C.FK_Estudiante = E.ID_Estudiante
JOIN Anio_Lectivo AL ON C.FK_Anio_Lectivo = AL.ID_Anio_Lectivo;
-- ----------------------------------------------------------------------------------------------------------------------

-- vista matriculas
CREATE VIEW view_matriculas AS
SELECT 
    M.ID_Matricula, 
    M.Cod_Matricula, 
    CONCAT(E.Pri_Nombre, ' ', E.Seg_Nombre, ' ', E.Pri_Apellido, ' ', E.Seg_Apellido) AS Nombre_Estudiante,
    E.Telefono, 
    CONCAT(Gr.Grado, ' ', Sec.Seccion) AS Grupo, 
    T.Turno, 
    Est.Estado, 
    E.Direccion, 
    A.Anio, 
    M.Fecha_Matricula,
    CONCAT(Tut.Pri_Nombre, ' ', Tut.Seg_Nombre, ' ', Tut.Pri_Apellido, ' ', Tut.Seg_Apellido) AS Nombre_Tutor
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
-- ----------------------------------------------------------------------------------------------------------------------

-- Vista usuarios
CREATE OR REPLACE VIEW view_usuarios AS
SELECT U.ID_User, U.Usuario, U.Contrasena, T.Tipo AS Permisos, CONCAT(U.Pri_Nombre, ' ', U.Seg_Nombre, ' ', U.Pri_Apellido, ' ', U.Seg_Apellido) AS Nombre_Usuario, U.Telefono, U.Correo_Electronico, U.imagen
FROM USERS U
JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo;