<?php
include_once "../models/conexion.model.php";
include_once "../models/matricula.model.php";

$objMatricula = new Matricula();

// Crear
if (isset($_POST['Cod_Matricula']) && isset($_POST['FK_Estudiante']) && isset($_POST['FK_Grado']) && isset($_POST['FK_Seccion']) && isset($_POST['FK_Turno']) && isset($_POST['FK_Estado']) && isset($_POST['FK_Anio_Lectivo']) && isset($_POST['Fecha_Matricula'])) {
    $codMatricula = $_POST['Cod_Matricula'];
    $fkEstudiante = $_POST['FK_Estudiante'];
    $fkGrado = $_POST['FK_Grado'];
    $fkSeccion = $_POST['FK_Seccion'];
    $fkTurno = $_POST['FK_Turno'];
    $fkEstado = $_POST['FK_Estado'];
    $fkAnioLectivo = $_POST['FK_Anio_Lectivo'];
    $fechaMatricula = $_POST['Fecha_Matricula'];

    if ($objMatricula->create($codMatricula, $fkEstudiante, $fkGrado, $fkSeccion, $fkTurno, $fkEstado, $fkAnioLectivo, $fechaMatricula)) {
        header("Location:../views/registration.view.php?create=1");
    } else {
        header("Location:../views/registration.view.php?create=0");
    }
}
