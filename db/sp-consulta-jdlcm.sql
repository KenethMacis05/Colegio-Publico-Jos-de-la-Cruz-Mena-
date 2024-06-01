-- SP Tutores
CALL sp_create_tutor('', '', '', '', '', '', '', '');
CALL sp_read_tutor();
CALL sp_update_tutor('', '', '', '', '', '', '', '', '');
CALL sp_delete_tutor('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Estudiantes
CALL sp_create_student('', '', '', '', '', '', '', '', '', '', '', '');
CALL sp_read_student();
CALL sp_update_student('', '', '', '', '', '', '', '', '', '', '', '', '');
CALL sp_delete_student('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Periodo Escolar
CALL sp_create_school_period('', '', '', '');
CALL sp_read_school_period();
CALL sp_update_school_period('', '', '', '', '');
CALL sp_delete_school_period('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Calificaciones
CALL sp_create_calificaciones('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
CALL sp_read_calificaciones();
CALL sp_update_calificaciones('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
CALL sp_delete_calificaciones('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Matriculas
CALL sp_create_matricula('', '', '', '', '', '', '', '');
CALL sp_read_matricula();
CALL sp_update_matricula('', '', '', '', '', '', '', '', '');
CALL sp_delete_matricula('');
-- ----------------------------------------------------------------------------------------------------------------------
-- SP Usuarios
CALL sp_create_user('', '', '', '', '', '', '', '', '', '');
CALL sp_read_user();
CALL sp_update_user('', '', '', '', '', '', '', '', '', '', '');
CALL sp_delete_user('');