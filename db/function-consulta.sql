-- 1) function_calcular_edad(ID)
SELECT function_calcular_edad(Fecha_Nacimiento) AS Edad FROM Estudiantes WHERE ID_Estudiante = '' OR Pri_Nombre = 'Juan';
SELECT function_calcular_edad2(0, 'Maria') AS Edad;
SELECT function_calcular_edad3(2, '', '') AS Edad;

-- 2) function_estudiante_grado(ID, Grado)
SELECT CASE WHEN function_estudiante_grado('1', '1ro') THEN 'El estudiante esta en el grado' ELSE 'No esta en este grado' END AS Mensaje;
SELECT CASE WHEN function_estudiante_grado2('1', '1ro', '2024') THEN 'El estudiante esta en el grado' ELSE 'No esta en este grado o año' END AS Mensaje;

-- 3) function_estudiante_inscrito(ID)
SELECT CASE 
	WHEN function_estudiante_inscrito('1') THEN 'El estudiante está matriculado.'
	ELSE 'El estudiante NO está matriculado.'
END AS Mensaje;

-- 4) function_estudiantes_grupo(Grado, Seccion)
SELECT function_estudiantes_grupo('1ro', 'A') AS Nombres_Estudiantes;

-- 5) function_estudiantes_inscritos
SELECT function_estudiantes_inscritos() AS Total_Estudiantes;

-- 6) function_obtener_nombre(ID)
SELECT function_obtener_nombre('2') AS Nombre_Completo;

-- 7) function_promedio_calificaciones(ID)
SELECT function_promedio_calificaciones('1') AS Promedio_Total;

-- 8) function_promedio_general
SELECT function_promedio_general() AS Promedio_General;

